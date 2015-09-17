enviarPedido = function(){
    alert('enviado');
    /*$.ajax({
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
                          var n_orden = data['NROORDEN'];
                          var n_pedido = data['NROPEDIDO'];
                          
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
                              mostrarProductos();
                              mensaje = "Número de Orden: "+n_orden+".\nNúmero de Pedido: "+n_pedido+"\nObservacion: Su pedido esta en proceso.";
                              alert(mensaje);
                          }).fail(function(){
                             console.log('Error'); 
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
  });   */
};


mostrarPedidos = function(status){
    $.ajax({
       url: 'mostrarPedidos',
       type: 'POST',
       dataType: 'json',
       data:{
           codigo_cliente: $('#hdCodigoCliente').val(),
           status: status
       },
       success: function(data){
           if(data['encontrado'] === true){
               $.map(data['pedidos'], function(item){
                  var fecha = String(item.Fecha).substr(8,2)+'/'+String(item.Fecha).substr(5,2)+'/'+String(item.Fecha).substr(0,4); 
                  var nro_orden = item.NumeroOrden === null ? 'SIN ASIGNAR' : item.NumeroPedido;
                  if(item.Status === 'POR PROCESAR'){
                    $('#tab_datospedido').find('tbody')
                    .append(
                        $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:12px;'})
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<a>',{href:'#'}).text(item.NumeroPedido))
                        )
                        .append(
                            $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Status))
                        )
                        .append(
                            $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(nro_orden))
                        )
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(fecha))
                        )
                        .append(
                            $('<td>', {style:'border: 1px solid #D0E5F5;', class:'centrado'})
                            .append($('<label>',{class:'centrado'}).text('ENVIADO'))
                        )
                    );  
                  }
                  else if(item.Status === 'PENDIENTE'){
                    $('#tab_datospedido').find('tbody')
                    .append(
                        $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:12px;'})
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;color:red;'}).append($('<a>',{href:'#'}).text(item.NumeroPedido))
                        )
                        .append(
                            $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;color:red;'}).append($('<label>').text(item.Status))
                        )
                        .append(
                            $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;color:red;'}).append($('<label>').text(nro_orden))
                        )
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;color:red;'}).append($('<label>').text(fecha))
                        )
                        .append(
                            $('<td>', {style:'border: 1px solid #D0E5F5;', class:'centrado'})
                            .append($('<input>', {id:'envi-'+item.Codigo, type:'button', class:'boton-click', value:'Enviar', title:'Enviar pedido'}).on('click', function(){
                                //agregarItem(this.id, $('#cant-'+item.Codigo).val(), $('#prec-'+item.Codigo).text(), $('#desc-'+item.Codigo).text(), item.UMF, $('#exis-'+item.Codigo).text());
                                enviarPedido(this.id);
                            }))
                        )
                    );
                  }
                   
               });
           }
       }
    });
    
    $('#selStatus').empty();
    $('#selStatus')
    .append(
        $('<option>',{value:'TODOS'}).text('TODOS')
    )
    .append(
        $('<option>',{value:'PEN'}).text('PENDIENTES')
    )
    .append(
        $('<option>',{value:'XPR'}).text('POR PROCESAR')
    )
    .append(
        $('<option>',{value:'PRO'}).text('PROCESADOS')
    );
        
    $('#selStatus').on('change', function(){
        console.log('entro');
       if($('#selStatus option:selected').val() === 'TODOS'){
           mostrarPedidos($('#selStatus option:selected').val());
       }
       else if($('#selStatus option:selected').val() === 'PEN'){
           mostrarPedidos($('#selStatus option:selected').val());
       }
       else if($('#selStatus option:selected').val() === 'XPR'){
           mostrarPedidos($('#selStatus option:selected').val());
       }
       else if($('#selStatus option:selected').val() === 'PRO'){
           mostrarPedidos($('#selStatus option:selected').val());
       }
    });
};

inicio = function(){
    mostrarPedidos('TODOS');
};

$(document).on('ready', function(){
    inicio();
});

