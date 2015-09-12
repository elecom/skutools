<?php

class APIRestController extends \BaseController {
        
        /**
         * <====================== SEGURIDAD ===========================> 
         */
    
        /**
         * @name            obtenerToken
         * 
         * @description     Retorna permiso de autenticacion
         */
        private function obtenerTokenUsuario(){
             set_time_limit(2000);
             $option = ['http' => [
                'method' => 'GET',
                'header' => ['Authorization: Basic '.base64_encode(Auth::user()->Usuario_Wservices.':'.Auth::user()->Password_Wservices),'Content-Type: application/json; charset=utf-8']
              ]];
             
             $context = stream_context_create($option);
             
             return file_get_contents('http://test.dronena.com:8083/REST/Cloud/Seguridad/Autenticacion', false, $context);
        }
        
        /**
         * <============================= PRODUCTOS =========================>
         */
        
        /**
         * @name            obtenerCatalogo
         * 
         * @description     Retorna listado de productos, dado a que la información 
         *                  de los maestros no cambian frecuentemente se recomienda 
         *                  que su llamado se haga máximo una vez al día.
         */
        public function obtenerCatalogo(){
             $chequeado = DB::table('chequeo_productos')
                     ->where('user_id','=',Auth::user()->id)
                     ->where('fecha','=',Fecha::arreglarFecha2(Fecha::fechaActual()))
                     ->first();
             
             if(!$chequeado){
                DB::insert("INSERT INTO ldcsyste_dbskutools.`chequeo_productos` (user_id, fecha, hora) VALUES(?, CURRENT_DATE(),CURRENT_TIME())", array(Auth::user()->id)); 
                
                set_time_limit(10000);
                $autorizacion = json_decode($this->obtenerTokenUsuario());    

                $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json']
                            ]];

                $context = stream_context_create($option);

                $productos = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Catalogo/Cliente/".Auth::user()->Codigo_Cliente, false, $context));
                
                if($productos){
                    foreach ($productos->Catalogo->Producto as $p){

                        $prod = DB::table('productos')
                                ->where('Codigo','=',$p->Codigo)
                                ->where('CodigoBarra','=',$p->CodigoBarra)
                                ->first();

                        // El producto no existe en base de datos (se agrega a la base de datos)
                        if(!$prod){
                            //echo "No encontrado codigo: ".$p->Codigo."<br>";
                            $produ = new Producto();
                            $produ->Codigo = $p->Codigo;
                            $produ->CodigoBarra = $p->CodigoBarra;
                            $produ->CodigoLaboratorio = $p->CodigoLaboratorio;
                            $produ->Nombre = $p->Nombre;
                            $produ->Tipo = $p->Tipo;
                            $produ->Condicion = $p->Condicion;
                            $produ->GravaImpuesto = $p->GravaImpuesto;
                            $produ->Fragil = $p->Fragil;
                            $produ->Refrigerado = $p->Refrigerado;
                            $produ->Toxico = $p->Toxico;
                            $produ->PrincipioActivo = $p->PrincipioActivo;
                            $produ->Clase = $p->Clase;
                            $produ->Nuevo = $p->Nuevo;
                            $produ->Marca = $p->Marca;
                            $produ->ISV = $p->ISV;
                            $produ->UMF = $p->UMF;
                            $produ->PorcentajeUMF = $p->PorcentajeUMF;
                            $produ->Ingreso = $p->Ingreso;
                            $produ->Administrado = $p->Administrado;
                            $produ->save();
                        }
                    }
                 }
             }
        }
        
        /**
         * @name            obtenerInventario
         * 
         * @description     Retorna un listado con las existencias del producto, 
         *                  precio, ofertas, lote, vencimiento y unidad de manejo 
         *                  del producto. Se recomienda que este servicio se invoque 
         *                  una vez al día de manera de obtener información de las 
         *                  ofertas para los siguientes llamados para actualizar el 
         *                  inventario debe invocarse el método “ObtenerExistencias”
         */
        public function obtenerInventario(){
             $chequeado = DB::table('chequeo_inventarios')
                     ->where('user_id','=',Auth::user()->id)
                     ->where('fecha','=',Fecha::arreglarFecha2(Fecha::fechaActual()))
                     ->first();
             
             if(!$chequeado){
                DB::insert("INSERT INTO ldcsyste_dbskutools.`chequeo_inventarios` (user_id, fecha, hora) VALUES(?, CURRENT_DATE(),CURRENT_TIME())", array(Auth::user()->id));
                $sede = DB::table('sedes')
                        ->where('id','=',Auth::user()->sede_id)
                        ->first();
                
                set_time_limit(10000);
                $autorizacion = json_decode($this->obtenerTokenUsuario());    
                    
                $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json']
                            ]];

                $context = stream_context_create($option);

                $inventarios = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Inventario/".$sede->Codigo."/Cliente/".Auth::user()->Codigo_Cliente, false, $context));

                foreach ($inventarios->Inventario->Producto as $i){
                    $inve = DB::table('inventarios')
                            ->where('user_id','=',Auth::user()->id)
                            ->where('Codigo','=',$i->Codigo)
                            ->where('CodigoBarra','=',$i->CodigoBarra)
                            ->first();

                    if(!$inve){

                        $produ = DB::table('productos')
                                ->where('Codigo','=',$i->Codigo)
                                ->where('CodigoBarra','=',$i->CodigoBarra)
                                ->first();

                        $inv = new Inventario();
                        $inv->user_id = Auth::user()->id;
                        $inv->Codigo = $i->Codigo;
                        $inv->CodigoBarra = $i->CodigoBarra;
                        $inv->Precio = $i->Precio;
                        $inv->Descuento = $i->Descuento;
                        $inv->Entrada = $i->Existencia;
                        $inv->Existencia = $i->Existencia;
                        $inv->DescuentoUfi = $i->DescuentoUfi;
                        $inv->DescuentoEmpaque = $i->DescuentoEmpaque;
                        $inv->UnidadEmpaque = $i->UnidadEmpaque;
                        $inv->DescuentoComercial = $i->DescuentoComercial;
                        $inv->DescuentoProntoPago = $i->DescuentoProntoPago;
                        $inv->Lote = $i->Lote;
                        $inv->Vencimiento = $i->Vencimiento;
                        $inv->UnidadManejo = $i->UnidadManejo;
                        $inv->FechaVenta = Fecha::arreglarFecha2(Fecha::fechaActual());

                        $inv->save();

                        $inv->productos()->attach($produ->id);

                    }
                    else{
                        $inv = Inventario::find($inve->id);
                        $inv->user_id = Auth::user()->id;
                        $inv->Codigo = $i->Codigo;
                        $inv->CodigoBarra = $i->CodigoBarra;
                        $inv->Precio = $i->Precio;
                        $inv->Descuento = $i->Descuento;
                        $inv->Entrada = $i->Existencia;
                        $inv->Existencia = $i->Existencia;
                        $inv->DescuentoUfi = $i->DescuentoUfi;
                        $inv->DescuentoEmpaque = $i->DescuentoEmpaque;
                        $inv->UnidadEmpaque = $i->UnidadEmpaque;
                        $inv->DescuentoComercial = $i->DescuentoComercial;
                        $inv->DescuentoProntoPago = $i->DescuentoProntoPago;
                        $inv->Lote = $i->Lote;
                        $inv->Vencimiento = $i->Vencimiento;
                        $inv->UnidadManejo = $i->UnidadManejo;
                        $inv->FechaVenta = Fecha::arreglarFecha2(Fecha::fechaActual());

                        $inv->save();

                    }
                }
            }
        }
        
        /**
         * @name            obtenerExistencia
         * 
         * @description     Retorna un listado solamente con las existencias y precios del producto, 
         *                  este servicio por tener solo existencias es el más liviano y rápido de 
         *                  consumir por lo cual se recomienda que los sistemas que actualicen su 
         *                  inventario varias veces al día invoquen este método.
         */
        public function obtenerExistencia(){
                $sede = DB::table('sedes')
                        ->where('id','=',Auth::user()->sede_id)
                        ->first();
             
                set_time_limit(10000);
                $autorizacion = json_decode($this->obtenerTokenUsuario()); 
                    
                $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json']
                            ]];

                $context = stream_context_create($option);

                $existencias = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Existencias/".$sede->Codigo."/Cliente/".Auth::user()->Codigo_Cliente, false, $context));
                
                if($existencias){
                    foreach ($existencias->Existencias->Producto as $e){

                        $inve = Inventario::where('user_id','=',Auth::user()->id)
                                                   ->where('Codigo','=',$e->Codigo)
                                                   ->where('CodigoBarra','=',$e->CodigoBarra)
                                                   ->where('updated_at','<>',Fecha::arreglarFecha2(Fecha::fechaActual()))
                                                   ->first();

                        if(!$inve){
                            continue;
                        }
                        else{
                            $inve->Precio = $e->Precio;
                            $inve->Descuento = $e->Descuento;
                            $inve->Existencia = $e->Existencia;
                            $inve->save();
                        }
                    }
                }
        }
        
        /**
         * @name            obtenerEntradasRecientes
         * 
         * @description     Retorna un listado con los productos que estaban en falla y que se 
         *                  recibieron en el día.
         */
        public function obtenerEntradasRecientes(){
                
                $sede = DB::table('sedes')
                        ->where('id','=',Auth::user()->sede_id)
                        ->first();
                
                set_time_limit(10000);
                $autorizacion = json_decode($this->obtenerTokenUsuario());
                    
                $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json']
                            ]];

                $context = stream_context_create($option);

                $entradas_recientes = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Entradas/".$sede->Codigo."/Cliente/".Auth::user()->Codigo_Cliente, false, $context));
                
                if($entradas_recientes){
                    
                }
        }
        
        /*
         * @name             obtenerProductoPromocion
         * 
         * @description      Retorna un listado con los producto que están en promoción para la fecha, aunque esta información
         *                   viaja en el método de “ObtenerInventario” se coloca a disposición para aquellos que se vean en
         *                   la necesidad actualizar las ofertas durante el día.
         */
        public function obtenerProductoPromocion(){
            
        }
        
        /**
         * @name            obtenerLaboratorios
         * 
         * @description     Retorna un listado con los Laboratorios que proveen 
         *                  productos a Droguería.
         */
        public function obtenerLaboratorios(){
            
                set_time_limit(10000);
                $autorizacion = json_decode($this->obtenerTokenUsuario());
                    
                $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json']
                            ]];

                $context = stream_context_create($option);

                $laboratorios = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Proveedor/Listado", false, $context));
                
                if($laboratorios){
                    foreach ($laboratorios->Proveedores->Proveedor as $p){
                        
                        $labo = Laboratorio::where('Codigo','=',$p->Codigo)->first();
                        
                        if(!$labo){
                            $lab = new Laboratorio();
                            $lab->Codigo = $p->Codigo;
                            $lab->Nombre = $p->Nombre;
                            $lab->save();
                        }
                    }
                }
        }
        
        /**
         *  <================================ VENTA =============================>
         */
        
        /**
         * @name        colocarPedido
         * 
         * @description     Publica Pedido del Cliente a Droguería para su procesamiento.
         */
        public function colocarPedido(){
            if(Request::ajax()){
                $id = Input::get('pedido_id');
                
                $pe = Pedido::find($id);
                
                $det = $pe->detalles;
                
                foreach ($det as $d){
                    $pro = DB::table('productos')
                            ->where('id','=',$d->producto_id)
                            ->first();
                    
                    $detalles[] = array(
                        "CodigoProducto" => $pro->Codigo,
                        "Cantidad" => $d->Cantidad,
                        "DescuentoNegociado" => 0
                    );
                }
                
                $sede = DB::table('sedes')
                        ->where('id','=',Auth::user()->sede_id)
                        ->first();
                
                $pedido = json_encode(array(
                    "NumeroPedido" => $pe->NumeroPedido,
                    "CodigoCliente" => Auth::user()->Codigo_Cliente,
                    "DescuentoNegociado" => 0,
                    "CodigoSede" => $sede->Codigo,
                    "Detalles" => $detalles
                ));
                                
                
                set_time_limit(10000);
                $autenticacion = json_decode($this->obtenerTokenUsuario());
                
                $options = ['http' => [
                    'method' => 'PUT',
                    'header' => ['Authorization: GUID '.$autenticacion->Guid,'Content-Type: application/json; charset=utf-8'],
                    'content' => $pedido
                ]];
                
                $context = stream_context_create($options);
                
                $respuesta = json_decode(file_get_contents("http://test.dronena.com:8083:/REST/Cloud/Venta/Pedido", false, $context));
                
                return Response::json($respuesta);
                
            }
        }
        
        /**
         * @name            obtenerFallasPedido
         * 
         * @description     Retorna un listado con las fallas (unidades no suplidas) 
         *                  de un pedido enviado.
         */
        public function obtenerFallasPedido(){
            
        }
        
        /**
         * @name            obtenerFacturasDelDia
         * 
         * @description     Retorna un listado con las facturas generadas en una 
         *                  fecha específica.     
         */
        public function obtenerFacturasDelDia(){
            
        }
        
        /**
         * @name            obtenerFactura
         * 
         * @description     Retorna información que compone una factura.
         */
        public function obtenerFactura(){
            
        }
        
        /**
         * @name            obtenerSedes
         * 
         * @description     Retorna un listado con las sedes o centro de distribución.
         */
        public function obtenerSedes(){
            
        }
        
        /**
         * @name            obtenerFacturasPedido
         * 
         * @description     Retorna un listado con las facturas generadas para un 
         *                  número de pedido especifico
         */
        public function obtenerFacturasPedido(){
            
        }
}
