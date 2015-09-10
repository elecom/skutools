<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Llamada al controlador Auth
Route::get('/login', 'AuthController@mostrarLogin');
Route::post('verificar', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logOut');

Route::get('/', function(){
            return Redirect::to('/login');
});

Route::group(['before' => 'auth'], function(){
    Route::get('/inicio', 'HomeController@inicio');
    Route::get('/entrada', 'HomeController@entrada');
    Route::get('/tomarpedido', 'HomeController@tomarPedido');
    Route::post('/mostrarProductos', 'HomeController@mostrarProductos');
    Route::post('/enviarPedido', 'HomeController@guardarPedido');
    Route::post('/restEnviarPedido', 'APIRestController@colocarPedido');
    Route::get('/obtenerCatalogo','APIRestController@obtenerCatalogo');
    Route::get('/obtenerInventario','APIRestController@obtenerInventario');
    Route::get('/obtenerExistencia','APIRestController@obtenerExistencia');
    
});

Route::get('/pruebarest', function(){
    set_time_limit(160);
    $option = ['http' => [
        'method' => 'GET',
        //'header' => ['Authorization: Basic cmVzdC0xOTY0OjEyMzQ1Njc4','Content-Type: application/json']
        'header' => ['Authorization: GUID 7BA98C0A-CCC4-4C4A-9B6E-2702C33CA9D6','Content-Type: application/json; charset=utf-8']
    ]];
    
    $context = stream_context_create($option);
    
    //echo file_get_contents("http://Test.dronena.com:8083/REST/Cloud/Seguridad/Autenticacion", false, $context);
    return file_get_contents("http://Test.dronena.com:8083/REST/Cloud/Producto/Catalogo/Cliente/0244", false, $context);
    ///echo utf8_decode(file_get_contents("http://Test.dronena.com:8083/REST/Cloud/Producto/Clase", false, $context));
});

Route::get('/pruebarest2', 'ProductoController@store');


/*Route::get('/', function()
{
	return View::make('hello');
});

Route::post('/guardarProducto', 'HomeController@guardarProducto');
Route::post('/guardarInventario', 'HomeController@guardarInventario');
Route::post('/mostrarProductos', 'HomeController@mostrarProductos');

Route::get('/registro', function(){
	//echo 'hola';
	return View::make('principal.registro');
});*/

Route::get('/guardarProducto', function(){
        
       $json_productos = file_get_contents('jsons/Productos.json');
        
       $datos_productos = json_decode($json_productos);
       
       set_time_limit(2000);
        
       foreach ($datos_productos->Catalogo->Producto as $d){
           
           $existe = DB::table('productos')
                   ->where('Codigo','=',$d->Codigo)
                   ->where('CodigoBarra','=',$d->CodigoBarra)
                   ->first();
           
           if(!$existe){
                $datos = array(
                     "Codigo" => $d->Codigo,
                     "CodigoBarra" => $d->CodigoBarra,
                     "CodigoLaboratorio" => $d->CodigoLaboratorio,
                     "Nombre" => $d->Nombre,
                     "Tipo" => $d->Tipo,
                     "Condicion" => $d->Condicion,
                     "GravaImpuesto" => $d->GravaImpuesto,
                     "Fragil" => $d->Fragil,
                     "Refrigerado" => $d->Refrigerado,
                     "Toxico" => $d->Toxico,
                     "PrincipioActivo" => $d->PrincipioActivo,
                     "Clase" => $d->Clase,
                     "Nuevo" => $d->Nuevo,
                     "Marca" => $d->Marca,
                     "ISV" => $d->ISV,
                     "UMF" => $d->UMF,
                     "PorcentajeUMF" => $d->PorcentajeUMF,
                     "Ingreso" => $d->Ingreso,
                     "Administrado" => $d->Administrado
                );

                $guardado = Producto::create($datos);

                 if($guardado){
                     echo "Producto Guardado: $d->Codigo<br>";
                 }
                 else{
                     echo "Producto sin Guardar: $d->Codigo<br>";
                 }
         }
    }
        
});

Route::get('/guardarInventario', function(){
    $json_inventario = file_get_contents('jsons/Inventario.json');
    
    $datos_inventario = json_decode($json_inventario);
    
    set_time_limit(2000);
    
    foreach ($datos_inventario->Inventario->Producto as $i){
        //echo $i->Existencia.'<br>';
        
            $u = DB::table('usuarios')
                    ->where('Codigo_Cliente','=','0244')
                    ->first();
            
            $producto = DB::table('productos')
                    ->where('Codigo','=',$i->Codigo)
                    ->where('CodigoBarra','=',$i->CodigoBarra)
                    ->first();
            
            if($u && $producto){
                //echo $producto[0]->Nombre;
                //exit(0);
                $inv = new Inventario();
                $inv->user_id = $u->id;
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
                
                $inv->productos()->attach($producto->id);
            

            //$guardado = Inventario::create($datos);

            //if($guardado){
                    echo "Producto Guardado: $i->Codigo<br>";
              /*  }
                else{
                    echo "Producto sin Guardar: $i->Codigo<br>";
                }*/
            }
        
    }
});

//Route::get('/cargarCatalogoProductos','APIRestController@cargarCatalogoProductos');

Route::get('/autorizacion', 'APIRestController@cargarCatalogoProductos');

Route::get('/actualizar', function(){
    $producto = DB::table('productos')
            ->where('Codigo','=','BI025')
            ->first();
    //$producto = Producto::where('Codigo','=','BI025');
    $producto->Nombre = "MICARDIS AMLO 80MG-10MG X14 COMPRIMIDOS";
    
    $producto2 = (array) $producto;
    
    DB::table('productos')
            ->where('Codigo','=','BI025')
            ->update($producto2);
            
    
    //echo $producto->Nombre;
});

Route::get('/consulta', function(){
    /*$detalles = DB::table('pedidos')
            ->where('NumeroPedido','=','0244150001')
            ->detallePedidos();*/
    //$pedido = Pedido::find(1)->detalles;
    
    //print_r($pedido);
    //exit(0);
    
    //$detalles = $pedido->detalles();
    
    //echo json_encode($pedido);
    
    /*$fechaActual = Fecha::arreglarFecha2(Fecha::fechaActual());
            
            
            $num_max_pedido = DB::table('pedidos')
                    ->where('CodigoCliente','=','0244')
                    ->max('NumeroPedido');
           
            $anioV = substr($num_max_pedido, 4, 2);
            $anioA = substr($fechaActual, 2, 2);
            
            if($anioA == $anioV){
                $numero = substr($num_max_pedido, 4, 6);
                
                $incrementarNumero = (integer) $numero + 1;
                
                $nuevoNumero = "0244".$incrementarNumero;
            }
            else{
                $nuevoNumero = "0244".$anioA."0001";
            }
            
            echo $nuevoNumero;*/
    
    /*$pe = Pedido::find(1)->detalles;
    
    foreach ($pe as $p){
        echo $p->Cantidad."<br>";
    }*/
    
    /*$pe = Pedido::find(1);
                
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
                        ->where('id','=',2)
                        ->first();
                
                $pedido = json_encode(array(
                    "NumeroPedido" => $pe->NumeroPedido,
                    "CodigoCliente" => "0244",
                    "DescuentoNegociado" => "0",
                    "CodigoSede" => $sede->Codigo,
                    "Detalles" => $detalles
                ));
    
                set_time_limit(10000);
                
                $options = ['http' => [
                    'method' => 'PUT',
                    'header' => ['Authorization: GUID 7BA98C0A-CCC4-4C4A-9B6E-2702C33CA9D6','Content-Type: application/json; charset=utf-8'],
                    'content' => $pedido
                ]];
                
                $context = stream_context_create($options);
                
                $respuesta = file_get_contents("http://test.dronena.com:8083/REST/Cloud/Venta/Pedido", false, $context);
                
                echo json_encode($respuesta);*/
    
    $u = User::find(1)->inventarios->productos;
                        
    //$productos = $u->inventario->productos;
           
    echo json_encode($u);
                
    
});

Route::get('/envio', function(){
    set_time_limit(10000);
    
    $optionA = ['http' => [
        'method' => 'GET',
        'header' => ['Authorization: Basic '.base64_encode('rest-1964:12345678'),'Content-Type: application/json; charset=utf-8']
    ]];
             
    $contextA = stream_context_create($optionA);
             
    $autorizacion = json_decode(file_get_contents('http://test.dronena.com:8083/REST/Cloud/Seguridad/Autenticacion', false, $contextA));    
    
    
    $optionB = ['http' => [
                    'method' => 'GET',
                    'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json; charset=utf-8']
                ]];

    $contextB = stream_context_create($optionB);

    $productos = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Catalogo/Cliente/0244", false, $contextB));
               
    //$inventarios = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Inventario/DN/Cliente/0244", false, $contextB));

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
    
});

Route::get('/envio2', function(){
    set_time_limit(10000);
    
    $optionA = ['http' => [
        'method' => 'GET',
        'header' => ['Authorization: Basic '.base64_encode('rest-1964:12345678'),'Content-Type: application/json; charset=utf-8']
    ]];
             
    $contextA = stream_context_create($optionA);
             
    $autorizacion = json_decode(file_get_contents('http://test.dronena.com:8083/REST/Cloud/Seguridad/Autenticacion', false, $contextA));    
    
    
    $optionB = ['http' => [
                    'method' => 'GET',
                    'header' => ['Authorization: GUID '.$autorizacion->Guid,'Content-Type: application/json; charset=utf-8']
                ]];

    $contextB = stream_context_create($optionB);

    //$productos = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Catalogo/Cliente/0244", false, $contextB));
               
    $inventarios = json_decode(file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Inventario/DN/Cliente/0244", false, $contextB));
    
    foreach ($inventarios->Inventario->Producto as $i){
        $inve = DB::table('inventarios')
                ->where('user_id','=',1)
                ->where('Codigo','=',$i->Codigo)
                ->where('CodigoBarra','=',$i->CodigoBarra)
                ->first();
        
        if(!$inve){
            
            $produ = DB::table('productos')
                    ->where('Codigo','=',$i->Codigo)
                    ->where('CodigoBarra','=',$i->CodigoBarra)
                    ->first();
            
            $inv = new Inventario();
            $inv->user_id = 1;
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
                        
            echo "Guardado inventario con codigo: ".$i->Codigo."<br>";
        }
        else{
            $inv = Inventario::find($inve->id);
            $inv->user_id = 1;
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
                       
             echo "Actualizado inventario con codigo: ".$i->Codigo."<br>";
        }
    }
});