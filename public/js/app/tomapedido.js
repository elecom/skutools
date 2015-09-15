/*window.onload = function(){
    MakeStaticHeader('TblId', 300, 400, 52, true, 'DivHeaderRow', 'DivMainContent', 'DivFooterRow');
    MakeStaticHeader('TblId', 300, 400, 52, true, 'headerProductos', 'contentProductos', 'footerProductos');
};*/

configextra = function(){
  
    $('#txtBusqueda').on('keyup', function(e){
     if($(this).val() !== ''){
         $.ajax({
            url: 'buscarProducto',
            type: 'POST',
            dataType: 'json',
            data:{
                palabra: $(this).val().toUpperCase()
            }
        }).done(function(data){
           $('#tab_datosproductos').find('tbody').empty();
           if(data['encontrado'] === true){
               $.map(data['productos'], function(item){
                   $('#tab_datosproductos').find('tbody').append(
                           $('<tr>')
                           .append(
                               $('<td>',{style:'width:100px;', class:'centrado'}).append($('<label>').text(item.Codigo))
                           )
                           .append(
                               $('<td>',{style:'width:600px;', class:'izq'}).append($('<label>').text(item.Descripcion))
                           )
                           .append(
                               $('<td>',{style:'width:100px;', class:'der'}).append($('<label>').text(item.Existencia))
                           )
                           .append(
                               $('<td>',{style:'width:100px;', class:'der'}).append($('<label>').text(item.Precio))
                           )
                   );
               });
           }
        });
     }
  });  
};

inicio = function(){
    MakeStaticHeader('TblId', 300, 400, 52, true, 'DivHeaderRow', 'DivMainContent', 'DivFooterRow');
    MakeStaticHeader('TblId', 300, 400, 52, true, 'headerProductos', 'contentProductos', 'footerProductos');
    
    configextra();
    
    $.ajax({
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
               ]
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
    });
};

$(document).on('ready', function(){
    inicio();
});

