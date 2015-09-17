
mostrarPedidos = function(){
    $.ajax({
       url: 'mostrarPedidos',
       type: 'POST',
       dataType: 'json',
       data:{
           codigo_cliente: $('#hdCodigoCliente').val()
       },
       success: function(data){
           if(data['encontrado'] === true){
               $.map(data['pedidos'], function(item){
                  var fecha = String(item.Fecha).substr(8,2)+'/'+String(item.Fecha).substr(5,2)+'/'+String(item.Fecha).substr(0,4); 
                  var nro_orden = item.NumeroOrden === null ? 'Sin Asignar' : item.NumeroPedido;
                  if(item.Status === 'POR PROCESAR'){
                    $('#tab_datospedido').find('tbody')
                    .append(
                        $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:12px;'})
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;color:green;'}).append($('<a>',{href:'#'}).text(item.NumeroPedido))
                        )
                        .append(
                            $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;color:green;'}).append($('<label>').text(item.Status))
                        )
                        .append(
                            $('<td>', {class:'centrado', style:'border: 1px solid #D0E5F5;color:green;'}).append($('<label>').text(nro_orden))
                        )
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;color:green;'}).append($('<label>').text(fecha))
                        )
                        .append(
                            $('<td>', {style:'border: 1px solid #D0E5F5;color:green;', class:'centrado'})
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
                            }))
                        )
                    );
                  }
                   
               });
           }
       }
    });
    
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
       if($('#selStatus option:selected').val() === 'TODOS'){
           alert('TODOS');
       }
       else if($('#selStatus option:selected').val() === 'PEN'){
           alert('pendientes');
       }
       else if($('#selStatus option:selected').val() === 'XPRO'){
           alert('por procesar');
       }
       else if($('#selStatus option:selected').val() === 'PRO'){
           alert('procesados');
       }
    });
};

inicio = function(){
    mostrarPedidos();
};

$(document).on('ready', function(){
    inicio();
});

