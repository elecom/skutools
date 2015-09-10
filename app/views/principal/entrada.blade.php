@extends('layout.base')
@section('titulo') Entradas @stop
@section('subtitulo') ENTRADA DE PRODUCTOS @stop

@section('contenido')
<div id="div_datosregistro" style="width: 900px; margin: 0 auto; text-align: center;">
    
    <!-- Caja de Datos -->
    <div style="width: 1050px; margin: 0 auto; margin-bottom: 20px;">
        <div style="width: 524px; float: left; text-align: left; border-left: 1px solid #D0E5F5; border-top: 1px solid #D0E5F5;">
            <table style="width: 500px; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td><label>Buscar Producto:</label><input type="text" id="txtBuscar" class="input-text" style="text-transform: uppercase;"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 524px; float: left; text-align: right; border-top: 1px solid #D0E5F5; border-right: 1px solid #D0E5F5;">
            <table style="width: 500px; margin: 0 auto; float: right;">
                <tbody>
                    <tr>
                        <td style="text-align: right;"><label>Carrito:</label><input type="text"  class="input-text der" id="txtCarrito" readonly="readonly" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="width: 1050px; margin: 0 auto; text-align: right; border-left: 1px solid #D0E5F5; border-right: 1px solid #D0E5F5; border-bottom: 1px solid #D0E5F5; padding-bottom: 5px;">
        <input id="btnVerPedido" type="button" class="boton-click" value="Ver Pedido" title="Presione aquí para ver los detalles del pedido" style="margin-right: 10px;"/>
        <!--<input id="btnEliminarPedido" type="button" class="boton-click" value="Cancelar Pedido" title="Presione aquí para eliminar el pedido"/>-->
    </div>
    <table id="tab_datosregistro" style="width: 1050px; margin: 0 auto;  margin-bottom: 50px; margin-top: 20px; font-size: 11px;">
            <thead>
                <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                    <!--<th style="width: 80px;" class="centrado"><label>C&oacute;digo</label></th>-->
                    <th style="width: 100px;" class="centrado"><label>C&oacute;digo</label></th>
                    <th style="width: 500px;" class="izq"><label>Descripci&oacute;n</label></th>
                    <th style="width: 100px;" class="centrado"><label>Precio</label></th>
                    <th style="width: 120px;"><label>Uni. Man.</label></th>
                    <!--<th style="width: 120px;"><label>Entrada</label></th>-->
                    <th style="width: 120px;"><label>Existencia</label></th>
                    <th style="width: 120px;"><label>Vencimiento</label></th>
                    <th style="width: 120px;"><label>A&ntilde;adir</label></th>
                </tr>
            </thead>
            <tbody></tbody>
     </table>
</div>
<div id="div_enviarpedido" class="ocultar">
    <table style="margin: 0 auto; width: 700px;" id="tab_enviarpedido">
        <thead>
                <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                    <th style="width: 70px;border: 1px solid #166294;" class="centrado"><label>C&oacute;digo</label></th>
                    <th style="width: 400px;border: 1px solid #166294;" class="izq"><label>Descripci&oacute;n</label></th>
                    <th style="width: 80px;border: 1px solid #166294;" class="centrado"><label>Cantidad</label></th>
                    <th style="width: 80px;border: 1px solid #166294;" class="centrado"><label>Precio</label></th>
                    <th style="width: 100px;border: 1px solid #166294;" class="centrado"><label>SubTotal</label></th>
                </tr>
            </thead>
        <tbody></tbody>
    </table>
    <div style="margin: 0 auto; width: 700px;" class="der">
        <strong><label>Total:</label><label id="lblTotal"></label></strong>
    </div>
    <div style="margin: 0 auto; margin-top: 20px; width: 700px;" class="der">
        <input id="btnEnviar" type="button" class="boton-click" value="Enviar"/>
        <input id="btnCancelar" type="button" class="boton-click" value="Cancelar"/>
    </div>
</div>
@stop

@section('script')
{{ HTML::script('jquery/jquery.uitablefilter.js') }}
{{ HTML::script('js/app/entrada.js') }}
@stop