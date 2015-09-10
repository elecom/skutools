/*
 * Variables Globales
 */
var codigos = new Array();
var precios = new Array();
var cantidades = new Array();
var descripciones = new Array();
var unidadmanejos = new Array();
var iniciar;
var a = 0;
var ban = 0;
//var indice;

agregarItem = function(id, cantidad, precio, descripcion, unidadmanejo){
    var codigo = String(id).substr(5);
    
    codigos.push(codigo);
    precios.push(precio);
    cantidades.push(cantidad);
    unidadmanejos.push(unidadmanejo);
    descripciones.push(descripcion);
    
        
    $('#txtCarrito').val((parseFloat($('#txtCarrito').val())+parseFloat(cantidad*precio)).toFixed(2)); 
    
    $('#qite-'+codigo).attr('value',cantidad).addClass('mostrar');
    $('#cant-'+codigo).addClass('ocultar');
    $('#aite-'+codigo).addClass('ocultar');
    
};

quitarItem = function(id){
    var codigo = String(id).substr(5);
    var indice = codigos.indexOf(codigo);
    
    $('#txtCarrito').val((parseFloat($('#txtCarrito').val())-parseFloat(precios[indice]*cantidades[indice])).toFixed(2)); 
    
    codigos.splice(indice, 1);
    precios.splice(indice, 1);
    cantidades.splice(indice, 1);
    unidadmanejos.splice(indice, 1);
    descripciones.splice(indice, 1);
    
    $('#qite-'+codigo).removeAttr('value').removeClass('mostrar');
    $('#cant-'+codigo).attr('value','1').removeClass('ocultar');
    $('#aite-'+codigo).removeClass('ocultar');
};

limpiarColAnadir = function(){
	var longitud = codigos.length;
	
	for(i=0;i<longitud;i++){
		$('#qite-'+codigos[i]).removeAttr('value').removeClass('mostrar');
    		$('#cant-'+codigos[i]).attr('value','1').removeClass('ocultar');
    		$('#aite-'+codigos[i]).removeClass('ocultar');
	}
	
	$('#div_enviarpedido').dialog('close');
	
	codigos = new Array();
	precios = new Array();
	cantidades = new Array();
	descripciones = new Array();
        unidadmanejos = new Array();
};

enviarPedido = function(){
  $.ajax({
      url: 'enviarPedido',
      type: 'POST',
      dataType: 'json',
      beforeSend: function() {
        $.blockUI({message: "Guardando Pedido...", overlayCSS: {backgroundColor: 'rgba(147, 207, 241, 0.84)'}});
      },
      data:{
          codigos: codigos,
          precios: precios,
          cantidades: cantidades,
          unidadManejo: unidadmanejos
      },
      success: function(data){
            //$.unblockUI();
            limpiarColAnadir();
            
            if(data["guardado"] === true){
                $.ajax({
                    url: 'restEnviarPedido',
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function() {
                       $.blockUI({message: "Enviando Pedido...", overlayCSS: {backgroundColor: 'rgba(147, 207, 241, 0.84)'}});
                    },
                    data:{
                        pedido_id: data['pedido_id']
                    },
                    success: function(data){
                      //$.unblockUI();
                      var mensaje;
                      
                      if(data["NROORDEN"] === null){
                          mensaje = "Pedido no procesado.\nObservación: "+data["OBSERVACIONES"]["OBSERVACION"];
                          alert(mensaje);
                      }  
                      else{
                          mensaje = "Número de Orden: "+data['NROORDEN']+".\nNúmero de Pedido: "+data['NROPEDIDO'];
                          alert(mensaje);
                          $.ajax({
                              url: 'actualizarPedido',
                              type: 'POST',
                              dataType: 'json',
                              data:{
                                  n_pedido: data['NROPEDIDO'],
                                  n_orden: data['NROORDEN'],
                                  status: 'POR PROCESAR'
                              }
                          }).done(function(data){
                              
                          }).fail(function(){
                              
                          }).always(function(){
                              
                          });
                      }
                      
                      $('#div_enviarpedido').dialog('close');
                      
                    }
                }).fail(function(){
                	alert('No se pudo enviar el pedido');
                }).always(function(){
                    $.unblockUI();
                    
                });
            }
      }
  }).fail(function(){
          alert('No se pudo guardar el pedido');
  }).always(function(){
    $.unblockUI();
    //limpiarColAnadir();
    $('#txtCarrito').val(parseFloat(0).toFixed(2));
  });   
};

cancelarPedido = function(){
	//$('#div_enviarpedido').dialog('close');
	limpiarColAnadir();
	$('#txtCarrito').val(parseFloat('0.00').toFixed(2));
};

verPedido = function(){
    if(codigos.length > 0){
        $('#div_enviarpedido').dialog({
           title:'Detalles del Pedido',
           width: 800,
           resizable: false,
           draggable: false,
           modal: true,
           autoOpen: false,

           open: function(){
               var longitud = codigos.length;

               for(i=0;i<longitud;i++){
                   $('#tab_enviarpedido').find('tbody')
                    .append(
                        $('<tr>')
                        .append(
                            $('<td>', { class: 'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(codigos[i]))
                        )
                        .append(
                            $('<td>', { class: 'izq', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(descripciones[i]))
                        )
                        .append(
                            $('<td>', { class: 'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(cantidades[i]))
                    
                        )
                        .append(
                            $('<td>', { class: 'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(parseFloat(precios[i]).toFixed(2)))
                        )
                        .append(
                            $('<td>', { class: 'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(parseFloat(precios[i]*cantidades[i]).toFixed(2)))
                        )
                    );
               }

               $('#lblTotal').text($('#txtCarrito').val());
           },

           close: function(){
                $('#tab_enviarpedido').find('tbody').empty();
                $('#lblTotal').text('');
           }
        }).css('over-flow-y','auto');

        $('#div_enviarpedido').dialog('open');
    }
};

mostrarProductos = function(){
  $.ajax({
      url:'mostrarProductos',
      type:'POST',
      dataType: 'json',
      beforeSend: function() {
        $.blockUI({message: "Cargando Productos...", overlayCSS: {backgroundColor: 'rgba(147, 207, 241, 0.84)'}});
      },
      success: function(data){
        //$.unblockUI();
        
        if(data["encontrado"] === true){
            
            if(!$('#div_enviarpedido').is(':hidden')) $('#div_enviarpedido').dialog('close');
            
            $('#tab_datosregistro').find('tbody').empty();
            $.map(data['productos'], function(item){
                var html = (item.Nuevo) ? item.Nombre+" (UMF "+item.UMF+") <span style='background-color: #57a957; color: #fff; margin-left: 3px; padding: 3px;'>Nuevo</span>" : item.Nombre+" (UMF "+item.UMF+")";

                var vencimiento = String(item.Vencimiento).substr(6,2)+'/'+String(item.Vencimiento).substr(4,2)+'/'+String(item.Vencimiento).substr(0,4);

                $('#tab_datosregistro').find('tbody')
                .append(
                    $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:11px;'})
                    .append(
                        $('<td>', {id:'cod-'+item.Codigo, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Codigo))
                    )
                    .append(
                        $('<td>', {class:'izq', style:'border: 1px solid #D0E5F5;'}).append($('<label>',{id:'desc-'+item.Codigo}).html(html))
                    )
                    .append(
                        $('<td>', {class:'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>',{id:'prec-'+item.Codigo}).text(item.Precio))
                    )
                    .append(
                        $('<td>', {class:'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>',{id:'unim-'+item.Codigo}).text(item.UnidadManejo))
                    )
                    /*.append(
                        $('<td>', {class:'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Entrada))
                    )*/
                    .append(
                        $('<td>', {class:'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Existencia))
                    )
                    .append(
                        $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(vencimiento))
                    )
                    .append(
                        $('<td>', {style:'border: 1px solid #D0E5F5;', class:'centrado'})
                        .append($('<input>', {id:'cant-'+item.Codigo, type:'number', class:'der', style:'width:80px;', min:1, max:item.Existencia, value:1}))
                        .append($('<input>', {id:'aite-'+item.Codigo, type:'button', class:'boton-click', value:'+', title:'Agregar producto al carrito'}).on('click', function(){
                            agregarItem(this.id, $('#cant-'+item.Codigo).val(), $('#prec-'+item.Codigo).text(), $('#desc-'+item.Codigo).text(), $('#unim-'+item.Codigo).text());
                        }))
                        .append($('<input>', {id:'qite-'+item.Codigo, type:'button', class:'boton-click2 ocultar', title:'Quitar producto del carrito', style:'margin:0 auto;'}).on('click', function(){
                            quitarItem(this.id);
                        }))
                    )
                );
            });
        }
        else{
            $('#tab_datosregistro').find('tbody').empty();
            $('#tab_datosregistro').find('tbody')
            .append(
                $('<tr>')
                .append(
                    $('<td>', {colspan:8, style:'font-size:13px; border: 1px solid #D0E5F5;'}).append($('<label>').html('<strong><i>No hay productos disponibles para la fecha</i></strong>'))
                )
            );
        }
      }
  }).fail(function(){
         // $.unblockUI();
  }).always(function(){
      $.unblockUI();
      limpiarColAnadir();
  });  
};

configextra = function(){
    var tabla = $('#tab_datosregistro');
    
    $('#txtBuscar').on('keyup', function(e){
        $.uiTableFilter(tabla, this.value);
    });
    
    $('#btnVerPedido').on('click', verPedido);
    $('#btnEnviar').on('click', enviarPedido);
    $('#btnCancelar').on('click', cancelarPedido);
    $('#div_enviarpedido').css('font-size','11px');
};

limpiar = function(){
  $('#txtBuscar').val('');
  $('#txtCarrito').val(parseFloat('0.00').toFixed(2));
  
  codigos = new Array();
  precios = new Array();
  cantidades = new Array();
  descripciones = new Array();
  
};

actualizarExistencias = function(){
    if(ban === 0){
        ban = 1;
        _worker_existencia = new Worker('worker_existencia.js');
        _worker_existencia.addEventListener('message', function(e){
            console.log(e.data);
            ban = 0;
        }, false);
        _worker_existencia.addEventListener('error', function(e){
            console.log('Error: '+e.data);
        }, false);

        _worker_existencia.postMessage('');
    }
    mostrarProductos();
};

mostrarBandeja = function(){
    /*$('#txtBuscar').val('');
    $('#txtCarrito').val(parseFloat('0.00').toFixed(2));
  
    codigos = new Array();
    precios = new Array();
    cantidades = new Array();
  
    mostrarProductos();

    // Trabajador para cargar el inventario diario
    _worker_inventario = new Worker('worker_inventario.js');
    _worker_inventario.addEventListener('message', function(e){
        console.log(e.data);
    }, false);
    _worker_inventario.addEventListener('error', function(e){
        console.log('Error: '+e.data);
    }, false);
    _worker_inventario.postMessage('');*/
    
    var d = new Date();
    begin = d.getTime();
    
    mostrarProductos();
    while(a === 0){
        d = new Date();
        if(d.getTime()-begin>15000){
            _worker_inventario = new Worker('worker_inventario.js');
            _worker_inventario.addEventListener('message', function(e){
                console.log(e.data);
            }, false);
            _worker_inventario.addEventListener('error', function(e){
                console.log('Error: '+e.data);
            }, false);
            _worker_inventario.postMessage('');
            
            a = 1;
        }
    }
    
    if(ban === 0){
        setInterval(actualizarExistencias, 120000);
    }
    else{
        setInterval(mostrarBandeja, 120000);
    }
};

inicio = function(){
    limpiar();
    configextra();
    
    // Trabajador para cargar el catalogo y producto diario
    _worker_producto = new Worker('worker_producto.js');
    _worker_producto.addEventListener('message', function(e){
        console.log(e.data);
    }, false);
    _worker_producto.addEventListener('error', function(e){
        console.log('Error: '+e.data);
    }, false);
    _worker_producto.postMessage('');
    
    //mostrarProductos();
    mostrarBandeja();
    
    //setInterval(limpiarYRefrescar, 120000);
    $('#txtBuscar').focus();
};

$(document).on('ready', function(){
   inicio(); 
});

