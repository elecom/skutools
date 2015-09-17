/*window.onload = function(){
    MakeStaticHeader('TblId', 300, 400, 52, true, 'DivHeaderRow', 'DivMainContent', 'DivFooterRow');
    MakeStaticHeader('TblId', 300, 400, 52, true, 'headerProductos', 'contentProductos', 'footerProductos');
};*/

configextra = function(){
    var tabla = $('#tab_datosproductos');
    
    $('#txtBusqueda').on('keyup', function(e){
        $.uiTableFilter(tabla, this.value);
    });
};

inicio = function(){
    MakeStaticHeader('TblId', 300, 400, 52, true, 'DivHeaderRow', 'DivMainContent', 'DivFooterRow');
    MakeStaticHeader('TblId', 300, 400, 52, true, 'headerProductos', 'contentProductos', 'footerProductos');
    
    configextra();
    
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
                        .append($('<input>', {id:'sele-'+item.Codigo, type:'button', class:'boton-click', value:'+', title:'Agregar el producto al carrito de compra'}).on('click', function(){
                            
                        }))
                    )
                );
            });
        }
    });
};

$(document).on('ready', function(){
    inicio();
});

