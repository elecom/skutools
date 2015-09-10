'use strict';

var codigos = new Array();
var precios = new Array();
var cantidades = new Array();

var app = angular.module('appEntrada',[]);

//app.factory()
app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('/%');
    $interpolateProvider.endSymbol('%/');
});

app.controller('productosController', function($scope, $http){
    
    // Empezar los workers para la busquedad de productos e inventario
    var _worker_producto, _worker_inventario;
    
    // Trabajador que carga catalogo de productos
    _worker_producto = new Worker('worker_productos.js');
    _worker_producto.addEventListener('message', productosHandler, false);
    _worker_producto.addEventListener('error', errorHandler, false);
    _worker_producto.postMessage('');
    
    // Trabajador que carga el inventario
    _worker_producto = new Worker('worker_inventario.js');
    _worker_producto.addEventListener('message', inventarioHandler, false);
    _worker_producto.addEventListener('error', errorHandler, false);
    _worker_producto.postMessage('');
    
    
        
    
    $scope.carrito = 0;
    $scope.mostrar = [];
    
    $http({
       method:'POST',
       url: 'mostrarProductos'
   }).success(function(response){
      $scope.productos = response.productos; 
   });
   
   $scope.keypressBuscar = function(e){
     
   };
   
   $scope.colocarItem = function(codigo, precio, cantidad){
       codigos.push(codigo);
       precios.push(precio);
       cantidades.push(cantidad);
    
       $scope.carrito = $scope.carrito + (precio*cantidad);
       
       $scope.mostrar[codigo] = !$scope.mostrar[codigo];             
       
   };
   
   $scope.quitarItem = function(codigo){
     var indice = codigos.indexOf(codigo);
     var precio = precios[indice];
     var cantidad = cantidades[indice];
     var monto = precio * cantidad;
     
     
     $scope.mostrar[codigo] = !$scope.mostrar[codigo];        
     
     codigos.splice(indice, 1);
     precios.splice(indice, 1);
     cantidades.splice(indice, 1);
     
     $scope.carrito = $scope.carrito - monto;
     $scope.cantidad = 1;
     
   };
   
   // Función para enviar el pedido
   $scope.enviarPedido = function(){
     if(codigos.length !== 0 && precios.length !== 0 && cantidades.length !== 0){
        var respuesta = confirm('¿Está seguro de enviar el pedido?');
     
        if(respuesta){
           var num = codigos.length;
           for(var i=0; i<num; i++){
               console.log(codigos[i]+' '+precios[i]+' '+cantidades[i]);
           }
        }
     }
     
   };
   
   $scope.eliminarPedido = function(){
     if(codigos.length !== 0 && precios.length !== 0 && cantidades.length !== 0){
        var respuesta = confirm('¿Está seguro de cancelar el pedido?');

        if(respuesta){
           var longitud = codigos.length;
            
           $scope.carrito=0;
           $scope.cantidad=1;
           
           for(var i=0;i<longitud;i++){
               if($scope.mostrar[codigos[i]] === true){
                   $scope.mostrar[codigos[i]] = !$scope.mostrar[codigos[i]];
                   $scope.cantidad[codigos[i]] = 1;
                   console.log(codigos[i]);
               }
           }
           
           codigos = new Array();
           precios = new Array();
           
        }
     }
   };
});

function productosHandler(e){
   console.log(e.data);
}

function inventarioHandler(e){
    console.log(e.data);
}

function errorHandler(e){
    console.log(e.data);
}
