<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function inicio()
	{
		return View::make('principal.index');
	}

        public function entrada()
	{
		return View::make('principal.entrada');
	}
        
        public function tomarPedido(){
            return View::make('principal.tomapedido');
        }
        
        public function reportePedido(){
            return View::make('principal.reportepedido');
        }


        public function actualizarPedido(){
            if(Request::ajax()){
                
                $p = Pedido::where('NumeroPedido','=',Input::get('n_pedido'))
                        ->where('CodigoCliente','=',Auth::user()->Codigo_Cliente)
                        ->first();
                
                $p->NumeroOrden = Input::get('n_orden');
                $p->Status = 'POR PROCESAR';
                $p->Enviado = 1;
                
                $p->save();
                
                return Response::json(array('actualizado'=>true));
                
            }
        }
        
        public function buscarProducto(){
            if(Request::ajax()){
                $productos = DB::select("
                        SELECT 
                            p.Codigo AS Codigo,
                            p.Nombre AS Descripcion,
                            i.Existencia AS Existencia,
                            i.Precio AS Precio
                         FROM 
                            productos AS p,
                            inventarios AS i,
                            inventario_producto AS ip
                         WHERE
                            i.user_id = ? AND
                            i.id = ip.inventario_id AND
                            ip.producto_id = p.id AND
                            (
                                p.Codigo LIKE '?%' OR
                                p.Nombre LIKE '?%' OR
                                p.CodigoBarra LIKE '?%'
                            )", 
                        array(Auth::user()->id, Input::get('palabra'), Input::get('palabra'), Input::get('palabra')));
                
                if($productos){
                    return Response::json(array(
                        "encontrado" => true,
                        "productos" => $productos
                    ));
                }
                else{
                    return Response::json(array(
                        "encontrado" => false
                    ));
                }
                
            }
        }

        public function guardarProducto(){
		if(Request::ajax()){
			$data = Input::all();
			
			$guardado = Producto::create($data);	

			if($guardado){
				return Response::json(
					array(
						'guardado' => true,
						'msg' => 'Guardado'
					)
				);
			}
			else{
				return Response::json(
					array(
						'guardado' => false,
						'msg' => 'No Guardado'
					)
				);
			}
		}
	}

        public function guardarPedido(){
            if(Request::ajax()){
                $num_productos = count(Input::get('codigos'));
                $codigos = Input::get('codigos');
                $cantidades = Input::get('cantidades');
                $unidadManejo = Input::get('unidadManejo');
                
                $n_pedido = $this->tomarNumPedido();
                
                $pedido = new Pedido();
                $pedido->sede_id = Auth::user()->sede_id;
                $pedido->NumeroPedido = $n_pedido;
                $pedido->CodigoCliente = Auth::user()->Codigo_Cliente;
                $pedido->DescuentoNegociado = 0;
                $pedido->Status = 'PENDIENTE';
                $pedido->Enviado = 0;
                
                $pedido->save();
                
                
                /*$id_pedido = DB::table('pedidos')
                        ->insertGetId($nuevo_pedido);
                */
                $id_pedido = $pedido->id;
                        
                if($id_pedido){
                    for($i=0;$i<$num_productos;$i++){
                        $producto = DB::table('productos')
                                ->where('Codigo','=',$codigos[$i])
                                ->first();
                	
                        $decremento = $cantidades[$i];
                        
                	DB::table('inventarios')
                		 ->where('user_id','=',Auth::user()->id)
                	         ->where('Codigo','=',$codigos[$i])
                	         ->decrement('Existencia', $decremento);
                	         
                	
                	
                	$detalle = new Detalle();
                	$detalle->pedido_id = $id_pedido;
                	$detalle->producto_id = $producto->id;
                	$detalle->Cantidad = $cantidades[$i];
                	$detalle->DescuentoNegociado = 0;
                	
                        $detalle->save();
                	        
                    }
                    
                    return Response::json(array(
                        "guardado" => true,
                        "pedido_id" => $id_pedido
                    ));
                }
            }
        }
        
        private function tomarNumPedido(){
            $fechaActual = Fecha::arreglarFecha2(Fecha::fechaActual());
            
            
            $num_max_pedido = DB::table('pedidos')
                    ->where('CodigoCliente','=',Auth::user()->Codigo_Cliente)
                    ->max('NumeroPedido');
           
            $anioV = substr($num_max_pedido, 4, 2);
            $anioA = substr($fechaActual, 2, 2);
            
            if($anioA == $anioV){
                $numero = substr($num_max_pedido, 4, 6);
                
                $incrementarNumero = (integer) $numero + 1;
                
                $nuevoNumero = Auth::user()->Codigo_Cliente.$incrementarNumero;
            }
            else{
                $nuevoNumero = Auth::user()->Codigo_Cliente.$anioA."0001";
            }
            
            return $nuevoNumero;
       
        } 
        
	public function guardarInventario(){
		if(Request::ajax()){
			$data = Input::all();
			
			$guardado = Inventario::create($data);	

			if($guardado){
				return Response::json(
					array(
						'guardado' => true,
						'msg' => 'Guardado'
					)
				);
			}
			else{
				return Response::json(
					array(
						'guardado' => false,
						'msg' => 'No Guardado'
					)
				);
			}
		}
	}

	public function mostrarProductos(){
		if(Request::ajax()){
                        //$u = User::find(Auth::user()->id);
                        
                        //$productos = $u->inventarios->productos;
                        
			$productos = DB::select(
				"SELECT
 					p.Codigo AS Codigo, 
 					p.Nombre AS Nombre,
                                        p.Nuevo AS Nuevo, 
                                        p.UMF AS UMF,
                                        i.Entrada AS Entrada,
 					i.Existencia AS Existencia, 
 					i.Precio AS Precio, 
 					i.UnidadManejo AS UnidadManejo,
                                        i.Vencimiento AS Vencimiento
                                FROM
  					ldcsyste_dbskutools.productos AS p,
  					ldcsyste_dbskutools.inventarios AS i, 
                                        ldcsyste_dbskutools.`inventario_producto` AS ip 
				WHERE
  					i.user_id = ? AND
                                        i.id = ip.inventario_id AND 
                                        ip.producto_id = p.id AND
                                        i.Existencia > 0 AND 
                                        i.Vencimiento > ?
                                ORDER BY 
                                        i.Vencimiento ASC,
                                        p.Nombre
                                ",
                                array(Auth::user()->id, Fecha::arreglarFecha3(Fecha::fechaActual()))
                        );

			if($productos){
				return Response::json(array(
					"encontrado" => true,
					"productos" => $productos
                                ));
			}
			else{
				return Response::json(array(
					"encontrado" => false
                                ));
			}

		}
	}
        
        public function mostrarPedidos(){
            if(Request::ajax()){
                $pedidos = Pedido::where('CodigoCliente','=',Input::get('codigo_cliente'))
                        ->orderBy('created_at','ASC')
                        ->get();
                
                if($pedidos){
                    return Response::json(array(
                        'encontrado' => true,
                        'pedidos' => $pedidos
                    ));
                }
                else{
                    return Response::json(array(
                        'encontrado' => false
                    ));
                }
                
            }
        }

}
