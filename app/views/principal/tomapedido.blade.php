@extends('layout.base')
@section('titulo') Pedidos @stop
@section('subtitulo') TOMAR PEDIDO @stop

@section('contenido')
<!--<div style="width: 900px; margin: 0 auto; text-align: center;">-->
    
    {{-- Tabla de Productos --}}
    {{-- Cabecera --}}
    <!--<div id="div_datosproductos" style="width: 100%; margin: 0 auto; min-height: 200px; max-height: 300px; border: 1px solid #D0E5F5; border-radius: 5px;">
            <div id="headerProductos" style="width: 900px; overflow: hidden;">
            <table style="width: 900px;">
                <thead>
                    <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                        <th style="width: 100px;" class="centrado"><label>C&oacute;digo</label></th>
                        <th style="width: 600px;" class="izq"><label>Descripci&oacute;n</label></th>
                        <th style="width: 100px;"><label>Existencia</label></th>
                        <th style="width: 100px;" class="centrado"><label>Precio</label></th>
                    </tr>
                </thead>
            </table>
        </div> 
        <div id="contentProductos" style="overflow-y: scroll; overflow-x: hidden; max-height: 200px;" onscroll="OnScrollDiv(this, 'headerProductos', 'footerProductos')">
            <table id="tab_datosproductos" style="width: 900px; margin: 0 auto;">
                <tbody></tbody>
         </table>
        </div>
        <div id="footerProductos" style="overflow: hidden;"></div>
    </div>-->
    
    {{-- Busqueda de Productos --}}
    <!--<div id="div_busqueda" style="width: 900px; margin: 0 auto; margin-top: 10px; margin-bottom: 10px; border: 1px solid #D0E5F5; height: 50px; border-radius: 5px;">
        <table id="tab_busqueda" style="width: 500px; margin: 0 auto;">
            <tbody>
                <tr>
                    <td style="width: 250px;" class="der"><label>Producto:</label></td>
                    <td style="width: 250px;" class="izq"><input type="text" id="txtBusqueda" placeholder="Busqueda..." style="text-transform: uppercase;"/></td>
                    <td style="width: 250px;" class="der"><label>Cantidad:</label></td>
                    <td style="width: 250px;" class="izq"><input type="text" id="txtCantidad" placeholder="Cantidad"/></td>
                </tr>
            </tbody>
        </table>
    </div>-->
    
    <!--<div id="div_datospedidos" style="width: 900px; border: 1px solid #D0E5F5; min-height: 200px; max-height: 300px; border-radius: 5px; margin-bottom: 50px;">
        <div style="overflow: hidden;" id="DivHeaderRow">
            <table>
                <thead>
                    <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                        <th style="width: 500px;" class="izq"><label>Descripci&oacute;n</label></th>
                        <th style="width: 100px;"><label>Cantidad</label></th>
                        <th style="width: 100px;" class="centrado"><label>Precio</label></th>
                        <th style="width: 100px;"><label>Total</label></th>
                        <th style="width: 100px;"><label>Acci&oacute;n</label></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div style="overflow-y: scroll; overflow-x: hidden; max-height: 200px; " onscroll="OnScrollDiv(this, 'DivHeaderRow', 'DivFooterRow')" id="DivMainContent">
            <table id="tab_datosregistro" style="width: 900px; margin: 0 auto;">
                <tbody></tbody>
         </table>
        </div>
        <div id="DivFooterRow" style="overflow:hidden">
        </div>
    </div>-->
    
    <div id="div_datospedidos_pruebas" style="width: 900px; border: 1px solid #D0E5F5; min-height: 200px; max-height: 600px; border-radius: 5px; margin-bottom: 50px; padding: 0px; float: right; margin-right: 50px;">
        <table id="tab_datospedidos_pruebas" width='100%' cellspacing='0' class="display cell-border compact stripe" style="margin: 0 auto;">
            <thead>
                <tr style="background-color: #D0E5F5; color: #2E6E9E;" >
                    <th >Codigo</th>
                    <th class="izq">Descripci&oacute;n</th>
                    <th>Precio</th>
                    <th>Vencimiento</th>
                </tr>
            </thead>
        </table>
    </div>
<!--</div>-->
@stop

@section('script_css')
{{ HTML::style('DataTables/media/css/jquery.dataTables.min.css') }}
{{ HTML::style('DataTables/media/css/dataTables.jqueryui.min.css') }}
@stop

@section('script')
{{ HTML::script('DataTables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('js/app/tomapedido.js') }}
{{ HTML::script('js/tablaHFija.js') }}
@stop
