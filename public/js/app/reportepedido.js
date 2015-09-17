
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
                  if(item.Status === 'POR PROCESAR'){
                    $('#tab_datospedido').find('tbody')
                    .append(
                        $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:12px;'})
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.created_at))
                        )
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<a>',{href:'#'}).text(item.NumeroPedido))
                        )
                        .append(
                            $('<td>', {class:'izq', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Status))
                        )
                        .append(
                            $('<td>', {class:'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.NumeroOrden))
                        )
                        .append(
                            $('<td>', {style:'border: 1px solid #D0E5F5;', class:'centrado'})
                            .append($('<input>', {id:'envi-'+item.NumeroPedido, type:'button', class:'boton-click', value:'Enviar', title:'Enviar pedido'}).attr('disabled','disabled').on('click', function(){
                                //agregarItem(this.id, $('#cant-'+item.Codigo).val(), $('#prec-'+item.Codigo).text(), $('#desc-'+item.Codigo).text(), item.UMF, $('#exis-'+item.Codigo).text());
                            }))
                        )
                    );  
                  }
                  else if(item.Status === 'PENDIENTE'){
                    $('#tab_datospedido').find('tbody')
                    .append(
                        $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:12px;'})
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.created_at))
                        )
                        .append(
                            $('<td>', {id:'cod-'+item.NumeroPedido, class:'centrado', style:'border: 1px solid #D0E5F5;'}).append($('<a>',{href:'#'}).text(item.NumeroPedido))
                        )
                        .append(
                            $('<td>', {class:'izq', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.Status))
                        )
                        .append(
                            $('<td>', {class:'der', style:'border: 1px solid #D0E5F5;'}).append($('<label>').text(item.NumeroOrden))
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
};

inicio = function(){
    mostrarPedidos();
};

$(document).on('ready', function(){
    inicio();
});

