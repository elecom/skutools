<?php

class ProductoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){
                    set_time_limit(160);
                    $option2 = ['http' => [
                        'method' => 'GET',
                        'header' => ['Authorization: Basic cmVzdC0xOTY0OjEyMzQ1Njc4','Content-Type: application/json']
                        //'header' => ['Authorization: GUID '.Session::get('guid'),'Content-Type: application/json; charset=utf-8']
                    ]];

                    $context2 = stream_context_create($option2);

                    $data = file_get_contents("http://test.dronena.com:8083/REST/Cloud/Producto/Catalogo/Cliente/0244", false, $context2);
                    
                    $productos = json_decode($data);
                    
                    //echo $productos->Codigo;
                    foreach ($productos as $producto){
                        print_r($producto);
                    }
            
                    //echo Session::flash('guid');
                    
                    
                }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
