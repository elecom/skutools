@extends('layout.base')
@section('titulo') Pedidos @stop
@section('subtitulo') REPORTE PEDIDOS @stop

@section('contenido')
<div style="width: 900px; margin: 0 auto; text-align: center;">
    <div style="width: 900px; margin: 0 auto;" class="izq">
        <label>Estado:</label>
        <select id="selStatus"></select>
    </div>
    <table id="tab_datospedido" style="width: 900px; margin: 0 auto;  margin-bottom: 20px; margin-top: 20px; font-size: 13px;">
            <thead>
                <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                    <th style="width: 100px;" class="centrado"><label>Nro Pedido</label></th>
                    <th style="width: 300px;" class="centrado"><label>Estado</label></th>
                    <th style="width: 200px;" class="centrado"><label>Nro Orden</label></th>
                    <th style="width: 100px;" class="centrado"><label>Fecha de Envio</label></th>
                    <th style="width: 200px;" class="centrado"><label>Acci&oacute;n</label></th>
                </tr>
            </thead>
            <tbody></tbody>
     </table>
</div>
<input type="hidden" id="hdCodigoCliente" value="<?php echo Auth::user()->Codigo_Cliente; ?>"/>
@stop

@section('script')
{{ HTML::script('js/app/reportepedido.js') }}
@stop
