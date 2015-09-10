<?php

class APIRestController extends \BaseController {
        
        /*
         * Función para solicitar permiso de autenticacion
         */
         private function obtenerToken(){
             set_time_limit(2000);
             $option = ['http' => [
                'method' => 'GET',
                'header' => ['Authorization: Basic '.base64_encode(Auth::user()->Usuario_Wservices.':'.Auth::user()->Password_Wservices),'Content-Type: application/json']
              ]];
             
             $context = stream_context_create($option);
             
             return file_get_contents('http://test.dronena.com:8083/REST/Cloud/Seguridad/Autenticacion', false, $context);
         }
        
        public function cargarProducto(){
             $chequeado = DB::table('chequeo_productos')
                     ->where('user_id','=',Auth::user()->id)
                     ->where('fecha','=',Fecha::arreglarFecha2(Fecha::fechaActual()))
                     ->first();
             
             if(!$chequeado){
                DB::insert("INSERT INTO ldcsyste_dbfarmaweb.`chequeo_productos` (user_id, fecha, hora) VALUES(?, CURRENT_DATE(),CURRENT_TIME())", array(Auth::user()->id)); 
                set_time_limit(10000);
    
                $autorizacion = json_decode($this->obtenerToken());    

                $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json']
                            ]];

                $context = stream_context_create($option);

                $productos = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Catalogo/Cliente/".Auth::user()->Codigo_Cliente, false, $context));

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
                 // El producto ya existe en la base de datos (se actualiza)
                 else{
                      $produ = Producto::find($prod->id);
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
         
        public function cargarInventario(){
             $chequeado = DB::table('chequeo_inventarios')
                     ->where('user_id','=',Auth::user()->id)
                     ->where('fecha','=',Fecha::arreglarFecha2(Fecha::fechaActual()))
                     ->first();
             
             if(!$chequeado){
                DB::insert("INSERT INTO ldcsyste_dbfarmaweb.`chequeo_inventarios` (user_id, fecha, hora) VALUES(?, CURRENT_DATE(),CURRENT_TIME())", array(Auth::user()->id));
                $sede = DB::table('sedes')
                        ->where('id','=',Auth::user()->sede_id)
                        ->first();
                
                set_time_limit(10000);
                
                $autorizacion = json_decode($this->obtenerToken());    
                    
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
        
        
        /*
         * Función para actualizar inventario
         * Se invocará cada 4 min
         */
        public function actualizarInventario(){
           if(Request::ajax()){
               $autorizacion = json_decode($this->obtenerToken());
               
               $sede = DB::table('sedes')
                       ->where('id','=',Auth::user()->sede_id)
                       ->first();
               
               $option = ['http' => [
                                'method' => 'GET',
                                'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json;']
                            ]];

                $context = stream_context_create($option);

                $existencias = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Existencias/".$sede->Codigo."/Cliente/".Auth::user()->Codigo_Cliente, false, $context));
                
                foreach ($existencias->Existencias->Producto as $e){
                    $item = DB::table('inventarios')
                                    ->where('user_id','=',Auth::user()->id)
                                    ->where('Codigo','=',$e->Codigo)
                                    ->where('CodigoBarra', '=', $e->CodigoBarra)
                                    ->first();
                    if($item){
                        $inventario = Inventario::find($item->id);
                        
                        $inventario->Precio = $e->Precio;
                        $inventario->DescuentoNegociado = $e->DescuentoNegociado;
                        if($inventario->Entrada < $e->Existencias){
                            
                        }
                        $inventario->Existencias = $e->Existencias;
                    }
                }
               
           } 
        }
        
        /*
         * Función para enviar pedido via API Rest
         */
        public function enviarPedido(){
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
                        "DescuentoNegociado" => "000"
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
                                
                
                $autenticacion = json_decode($this->obtenerToken());
                
                set_time_limit(10000);
                
                $options = ['http' => [
                    'method' => 'PUT',
                    'header' => ['Authorization: GUID '.$autenticacion->Guid,'Content-Type: application/json;'],
                    'content' => $pedido
                ]];
                
                $context = stream_context_create($options);
                
                $respuesta = json_decode(file_get_contents("http://test.dronena.com:8083:/REST/Cloud/Venta/Pedido", false, $context));
                
                return Response::json($respuesta);
            }
        }
}
