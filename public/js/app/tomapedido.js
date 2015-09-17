/*window.onload = function(){
    MakeStaticHeader('TblId', 300, 400, 52, true, 'DivHeaderRow', 'DivMainContent', 'DivFooterRow');
    MakeStaticHeader('TblId', 300, 400, 52, true, 'headerProductos', 'contentProductos', 'footerProductos');
};*/

configextra = function(){
    var tabla = $('#tab_datosproductos');
    
    $('#txtBusqueda').on('keyup', function(e){
        $.uiTableFilter(tabla, this.value, null, false);
    });
};

inicio = function(){
    MakeStaticHeader('TblId', 300, 400, 52, true, 'DivHeaderRow', 'DivMainContent', 'DivFooterRow');
    MakeStaticHeader('TblId', 300, 400, 52, true, 'headerProductos', 'contentProductos', 'footerProductos');
    
    configextra();
    
    /*$.ajax({
        url:'mostrarProductos',
        type: 'POST',
        dataType: 'json',
        success: function(data){
            $('#tab_datospedidos_pruebas').dataTable({
               scrollY: '300px',
               scrollCollapse: true,
               paging: true,
               pagingType:'full_numbers',
               data: data['productos'],
               language:{
                   decimal: ",",
                   thousands: ".",
                   lengthMenu: 'Mostrar _MENU_ por paginas',
                   zeroRecords: 'No hay datos disponibles'
               },
               info: false,
               ordering: false,
               columns:[
                   {'data':'Codigo'},
                   {'data':'Nombre'},
                   {'data':'Precio'},
                   {'data':'Existencia'},
                   {'data':'Vencimiento'}
               ],
               deferRender: true,
               order:[[0, 'asc']]
            });
            
            $('#tab_datospedidos_pruebas2').dataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                language:{
                    zeroRecords: 'No hay datos disponibles'
                }
            });
        }
    });*/
    $.ajax({
        url: 'mostrarProductos',
        type:'POST',
        dataType: 'json',
        success: function(data){
            $.map(data['productos'], function(item){
               $('#tab_datosproductos').find('tbody')
               .append(
                    $('<tr>', {style:'border: 1px solid #D0E5F5;font-size:13px;', class:'ocultar'})
                    .append(
                        $('<td>', {id:'cod-'+item.Codigo, class:'centrado', style:'border: 1px solid #D0E5F5; width: 97px'}).append($('<label>').text(item.Codigo))
                    )
                    .append(
                        $('<td>', {class:'izq', style:'border: 1px solid #D0E5F5; width: 490px;'}).append($('<label>',{id:'desc-'+item.Codigo}).text(item.Nombre+" (UMF "+item.UMF+")"))
                    )
                    .append(
                        $('<td>', {class:'der', style:'border: 1px solid #D0E5F5; width: 97px;'}).append($('<label>',{id:'exis-'+item.Codigo}).text(item.Existencia))
                    )
                    .append(
                        $('<td>', {class:'der', style:'border: 1px solid #D0E5F5; width: 97px;'}).append($('<label>',{id:'prec-'+item.Codigo}).text(item.Precio))
                    )
                    .append(
                        $('<td>', {style:'border: 1px solid #D0E5F5;', class:'centrado'})
                        /*.append($('<input>', {id:'cant-'+item.Codigo, type:'number', class:'der', style:'width:80px;', min:item.UMF, max:item.Existencia, value:item.UMF, step:item.UMF}))*/
                        .append($('<input>', {id:'sele-'+item.Codigo, type:'button', class:'boton-click', value:'+', title:'Agregar el producto al carrito de compra'}).on('click', function(){
                            //agregarItem(this.id, $('#cant-'+item.Codigo).val(), $('#prec-'+item.Codigo).text(), $('#desc-'+item.Codigo).text(), item.UMF, $('#exis-'+item.Codigo).text());
                        }))
                        /*.append($('<input>', {id:'qite-'+item.Codigo, type:'button', class:'boton-click2 ocultar', title:'Quitar producto del carrito', style:'margin:0 auto;'}).on('click', function(){
                            quitarItem(this.id, item.UMF);
                        }))*/
                    )
                );
            });
        }
    });
};

$(document).on('ready', function(){
    inicio();
});

