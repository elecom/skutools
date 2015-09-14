@extends('layout.base')

@section('titulo') Principal @stop
@section('contenido')
<div style="margin: 0 auto; width: 1100px; text-align:center; font-size:17px; font-style: italic; font-weight: bold; margin-bottom:30px; color: #2E6E9E;">
	ENTRADA DE PRODUCTOS
</div>
<div ng-app="appEntrada" ng-controller="productosController" id="div_datosregistro" style="width: 1100px; margin: 0 auto; text-align: center;">
    
    <!-- Caja de Datos -->
    <div style="width: 1050px; margin: 0 auto; margin-bottom: 20px;">
        <div style="width: 524px; float: left; text-align: left; border-left: 1px solid #D0E5F5; border-top: 1px solid #D0E5F5;">
            <table style="width: 500px; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td><label>Buscar:</label><input type="text" id="txtBuscar" class="input-text" ng-model="palabra" ng-keypress="keypressBuscar($event)" style="text-transform: uppercase;"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 524px; float: left; text-align: right; border-top: 1px solid #D0E5F5; border-right: 1px solid #D0E5F5;">
            <table style="width: 500px; margin: 0 auto; float: right;">
                <tbody>
                    <tr>
                        <td style="text-align: right;"><label>Carrito:</label><input type="text"  class="input-text der" id="txtCarrito" readonly="readonly" ng-model="carrito" ng-value="carrito|number:2"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="width: 1050px; margin: 0 auto; text-align: right; border-left: 1px solid #D0E5F5; border-right: 1px solid #D0E5F5; border-bottom: 1px solid #D0E5F5; padding-bottom: 5px;">
        <input id="btnEnviarPedido" type="button" class="boton-click" value="Enviar Pedido" title="Presione aquí para enviar el pedido" ng-click="enviarPedido()"/>
        <input id="btnEliminarPedido" type="button" class="boton-click" value="Cancelar Pedido" title="Presione aquí para eliminar el pedido" ng-click="eliminarPedido()"/>
    </div>
    <table id="tab_datosregistro" style="width: 1050px; margin: 0 auto;  margin-bottom: 50px; margin-top: 20px; font-size: 11px;">
            <thead>
                <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                    <!--<th style="width: 80px;" class="centrado"><label>C&oacute;digo</label></th>-->
                    <th style="width: 100px;border: 1px solid #166294;" class="centrado"><label>C&oacute;digo</label></th>
                    <th style="width: 500px;border: 1px solid #166294;" class="izq"><label>Descripci&oacute;n</label></th>
                    <th style="width: 100px;border: 1px solid #166294;" class="centrado"><label>Precio</label></th>
                    <th style="width: 120px;border: 1px solid #166294;"><label>Uni. Man.</label></th>
                    <th style="width: 120px;border: 1px solid #166294;"><label>Entrada</label></th>
                    <th style="width: 120px;border: 1px solid #166294;"><label>Existencia</label></th>
                    <th style="width: 120px;border: 1px solid #166294;"><label>Fecha</label></th>
                    <th style="width: 120px;border: 1px solid #166294;"><label>A&ntilde;adir</label></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="p in productos | filter:palabra" ng-class="{even: $even, odd: $odd}">
                    <td class="centrado" style="border:1px solid #D0E5F5;">
                        <label>/% p.Codigo %/</label>
                    </td>
                    <td class="izq" style="border:1px solid #D0E5F5;">
                        <label>/% p.Nombre %/ </label>
                        <span ng-show="p.Nuevo===1" style="background-color: #57a957; color: #fff; margin-left: 3px; padding: 3px;"><strong>{{'Nuevo'}}</strong></span>
                    </td>
                    <td class="der" style="border:1px solid #D0E5F5;">
                        <label>/% p.Precio | number:2  %/</label>
                    </td>
                    <td class="der" style="border:1px solid #D0E5F5;">
                        <label>/% p.UnidadManejo | number:2 %/</label>
                    </td>
                    <td class="der" style="border:1px solid #D0E5F5;">
                        <label>/% p.Entrada | number:0 %/</label>
                    </td>
                    <td class="der" style="border:1px solid #D0E5F5;">
                        <label>/% p.Existencia | number:0 %/</label>
                    </td>
                    <td class="centro" style="border:1px solid #D0E5F5;">
                        <label>/% p.Vencimiento %/</label>
                    </td>
                    <td style="border:1px solid #D0E5F5;">
                        <input name="cantidad" type="number"  step="1" min="1" max="/% p.Existencia %/" style="width: 80px;" class="der" ng-value="cantidad[p.Codigo]" ng-show="!mostrar[p.Codigo]" ng-model="cantidad[p.Codigo]" ng-init="cantidad[p.Codigo]=1"/>
                        <input name="baitem" type="button"  ng-click="colocarItem(p.Codigo,p.Precio,cantidad[p.Codigo])" ng-model="cantidad[p.Codigo]" value="+" class="boton-click" ng-show="!mostrar[p.Codigo]" title="Presione para agregar item al carrito de compra"/>
                        <input name="bqitem" type="button" ng-click="quitarItem(p.Codigo)" ng-value="-  cantidad[p.Codigo]" ng-model="cantidad[p.Codigo]" class="boton-click2" ng-show="mostrar[p.Codigo]" title="Presione para quitar item del carrito de compra"/>
                    </td>
                </tr>
            </tbody>
     </table>
</div>
@stop

@section('script')
{{--{{ HTML::script('js/app/registro.js') }}--}}
{{ HTML::script('js/app/entrada.js') }}
@stop