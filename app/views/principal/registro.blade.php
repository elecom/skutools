@extends('layout.base')

@section('titulo') Principal @stop
@section('contenido')
<div style="margin: 0 auto; width: 1100px; text-align:center; font-size:17px; font-style: italic; font-weight: bold; margin-bottom:30px; color: #2E6E9E;">
	ENTRADA DE PRODUCTOS
</div>
<div id="div_datosregistro" style="width: 1100px; margin: 0 auto; text-align: center;">
    
    <!-- Caja de Datos -->
    <div style="width: 1050px; margin: 0 auto; margin-bottom: 20px;">
        <div style="width: 524px; float: left; text-align: left; border-left: 1px solid #D0E5F5; border-top: 1px solid #D0E5F5;">
            <table style="width: 500px; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td><label>Buscar:</label><input type="text" id="txtBuscar"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 524px; float: left; text-align: right; border-top: 1px solid #D0E5F5; border-right: 1px solid #D0E5F5;">
            <table style="width: 500px; margin: 0 auto; float: right;">
                <tbody>
                    <tr>
                        <td style="text-align: right;"><label>Carrito:</label><input type="text" id="txtCarrito" readonly="readonly" class="der"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="width: 1050px; margin: 0 auto; text-align: right; border-left: 1px solid #D0E5F5; border-right: 1px solid #D0E5F5; border-bottom: 1px solid #D0E5F5; padding-bottom: 5px;">
        <input id="btnEnviarPedido" type="button" value="Enviar Pedido" title="Presione aquí para enviar el pedido"/>
        <input id="btnEliminarPedido" type="button" value="Eliminar Pedido" title="Presione aquí para eliminar el pedido"/>
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
            <tbody></tbody>
     </table>
</div>
@stop

@section('script')
{{--{{ HTML::script('jquery/jquery.blockUI.js') }}--}}
{{--{{ HTML::script('js/jquery.rest/dist/1/jquery.rest.min.js') }}--}}
{{ HTML::script('js/app/registro.js') }}
@stop