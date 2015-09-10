//var codigo;

//$(document).on('ready', function(){
		


		//$.getJSON('jsons/Inventario.json', function(data){
			
			//$('#tab_datosregistro').find('tbody').empty();

			/*$.map(data['Inventario']['Producto'], function(item){
				
				/*console.log('Inventario: '+item.Codigo);
				codigo = item.Codigo;


				$.getJSON('jsons/Productos.json', function(data2){

						$map(data2['Catalogo']['Producto'], function(item2){
							console.log('Producto: '+item2.Codigo);
							if(codigo === item2.Codigo){
								$('#tab_datosregistro').find('tbody')
								.append(
									$('<tr>')
									.append(
										$('<td>').append($('<label>').text(item2.Codigo))
									)
									.append(
										$('<td>',{style:'text-align:left;'}).append($('<label>').text(item2.Nombre))
									)
									.append(
										$('<td>').append($('<label>').text(item.Precio))
									)
									.append(
										$('<td>').append($('<label>').text(''))
									)
									.append(
										$('<td>').append($('<label>').text(''))
									)
									.append(
										$('<td>').append($('<label>').text(''))
									)
									.append(
										$('<td>').append($('<label>').text(''))
									)
									.append(
										$('<td>').append($('<label>').text(''))
									)
								);
							}
		
						});
				});
				*/
				
				//codigos.push(item.Codigo)

				/*$.ajax({
					url: 'guardarInventario',
					type: 'POST',
					dataType: 'json',
					data:{
						codigo: item.Codigo,
						precio: item.Precio,
						existencia: item.Existencia,
						fecha_ven: item.Vencimiento,
						uni_manejo: item.UnidadManejo
					},
					success: function(data){
						if(data['guardado'] === true){
							console.log(data['msg'])	
						} 
					}
				})*/



			//});
			
	//	});
//});
pruebarest = function(){
    /*var client = new $.RestClient('http://Test.dronena.com:8083/REST/Cloud/Seguridad/', {
        username: 'rest-1964',
        password: '12345678'
    });
    
    client.add('Autenticacion', {
        stripTrailingSlash: true
    });
    
    var request = client.Autenticacion.read();
    
    request.done(function(data, textStatus, xhrObject){
        console.log(data);
    });
    //console.log(client.Producto.read());*/
    
    /*$.ajax({
       type: 'GET',
       url:'http://Test.dronena.com:8083/REST/Cloud/Seguridad/Autenticacion',
       //url:'http://test.dronena.com:8083/REST/Cloud/Productos/Catalogo/Cliente/0244',
       //callback:'?',
       //dataType:'application/json',
       crossDomain: true,
       beforeSend: function(xhr){
           xhr.setRequestHeader('Authorization','Basic '+btoa('rest-1964:12345678'));
       },
       headers:{
           //'Authorization':'Basic '+btoa('rest-1964:12345678'),
           'Content-Type':'application/json',
           'Access-Control-Allow-Origin':'*'
       },
       success: function(data){
           console.log('Enviado');
       }
    });*/
    console.log('entre');
    
    $.ajax({
        url:'pruebarest',
        type:'GET',
        dataType:'json',
        beforeSend: function() {
                    $.blockUI({message: "Cargando...", overlayCSS: {backgroundColor: 'rgba(147, 207, 241, 0.84)'}});
        },
        success: function(data){
            //console.log(data);
            $.unblockUI();
            
            
            $('#tab_datosregistro').find('tbody').empty();
            $.map(data['Catalogo']['Producto'], function(item){
                $('#tab_datosregistro').find('tbody')
							.append(
								$('<tr>', {id:item.Codigo, style:'font-size:11px;'})
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Codigo))
									)
									.append(
										$('<td>',{style:'text-align:left;border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Nombre))
									)
									.append(
										$('<td>',{style:'text-align:right;border: 1px solid #D0E5F5;'}).append($('<label>').text(''))
									)
									.append(
										$('<td>',{style:'text-align:right;border: 1px solid #D0E5F5;'}).append($('<label>').text(''))
									)
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(''))
									)
									.append(
										$('<td>',{style:'text-align:right;border: 1px solid #D0E5F5;'}).append($('<label>').text(''))
									)
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(''))
									)
									.append(
										$('<td>', {style:'border: 1px solid #D0E5F5;'})
										.append(
											$('<input>',{id:'cant-'+item.Codigo, type:'text', style:'text-align:right;width:50px;', value:'1'})
										)
										.append(
											$('<input>',{id:item.Codigo, type:'button',value:'+',style:'float:right;', title:'Presione aquí para agregar al carrito'}).button().on('click', function(){
												alert($('#cant-'+this.parentNode.parentNode.id).val());
											})
										)
									)
							);
            });
        }
    });
};

cargarP = function(){
    /*$.getJSON('jsons/Productos.json', function(data){
        $.map(data['Catalogo']['Producto'], function(item){
            console.log(item.Codigo);
            $.ajax({
                url: 'guardarProducto',
                type: 'POST',
                dataType: 'json',
                data:{
                    Codigo: item.Codigo,
                    CodigoBarra: item.CodigoBarra,
                    CodigoLaboratorio: item.CodigoLaboratorio,
                    Nombre: item.Nombre,
                    Tipo: item.Tipo,
                    Condicion: item.Condicion,
                    GravaImpuesto: item.GravaImpuesto,
                    Fragil: item.Fragil,
                    Refrigerado: item.Refrigerado,
                    Toxico: item.Toxico,
                    PrincipioActivo: item.PrincipioActivo,
                    Clase: item.Clase,
                    Nuevo: item.Nuevo,
                    Marca: item.Marca,
                    ISV: item.ISV,
                    UMF: item.UMF,
                    PorcentajeUMF: item.PorcentajeUMF,
                    Ingreso: item.Ingreso,
                    Administrado: item.Administrado
                },
                success: function(data){
                    console.log('Guardado');
                }
            }); 
        });
    });*/
    
    $.ajax({
        url:'guardarProductos',
        type:'POST',
        dataType: 'json',
        success: function(data){
            console.log('guardado los datos');
        }
    });
};

cargarI = function(){
  $.getJSON('Inventario.json', function(data){
     $.map(data['Producto'], function(item){
        $.ajax({
            url: 'guardarInventario',
            type: 'POST',
            dataType: 'json'
        }); 
     }); 
  });  
};

cargarE = function(){
  $.getJSON('Existencias.json', function(data){
     $.map(data['Producto'], function(item){
        $.ajax({
            url: 'guardarInventario',
            type: 'POST',
            dataType: 'json'
        }); 
     }); 
  });  
};

cargarProductos = function(){
	$.ajax({
		url: 'mostrarProductos',
                type: 'POST',
		dataType: 'json',
                success: function(data){
                        $('#tab_datosregistro').find('tbody').empty();
			$.map(data['productos'], function(item){
				if(data['encontrado']=== true){
					$('#tab_datosregistro').find('tbody')
							.append(
								$('<tr>', {id:item.Codigo, style:'font-size:11px;'})
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;', class:'centrado'}).append($('<label>').text(item.Codigo))
									)
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;', class:'izq'}).append($('<label>').text(item.Nombre))
									)
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;', class:'der'}).append($('<label>').text(item.Precio))
									)
									.append(
										$('<td>',{style:'text-align:right;border: 1px solid #D0E5F5;'}).append($('<label>').text(item.UnidadManejo))
									)
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;', class:'der'}).append($('<label>').text(item.Entrada))
									)
									.append(
										$('<td>',{style:'text-align:right;border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Existencia))
									)
									.append(
										$('<td>',{style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Vencimiento))
									)
									.append(
										$('<td>', {style:'border: 1px solid #D0E5F5;'})
										.append(
											$('<input>',{id:'cant-'+item.Codigo, type:'text', style:'text-align:right;width:50px;', value:'1'})
										)
										.append(
											$('<input>',{id:item.Codigo, type:'button',value:'+',style:'float:right;', title:'Presione aquí para agregar al carrito'}).button().on('click', function(){
												alert($('#cant-'+this.parentNode.parentNode.id).val());
											})
										)
									)
							);
				}
			});
		}
	});
};

cargarCarrito = function(id, cantidad){
    try{
        
    }
    catch(e){
        console.log(e);
    }
};

config = function(){
    try{
        $('#btnEnviarPedido,#btnEliminarPedido').css('font-size','11px');
        $('#btnEnviarPedido,#btnEliminarPedido').button();
    }
    catch(e){
        
    }
};


$(document).on('ready', function(){
        config();
	//cargarP();
        //pruebarest();
        cargarProductos();
        
});