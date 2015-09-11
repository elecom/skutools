@extends('layout.base')
@section('titulo') Pedidos @stop
@section('subtitulo') TOMAR PEDIDO @stop

@section('contenido')
<div style="width: 900px; margin: 0 auto; text-align: center;">
    <div id="div_datosproductos" style="width: 100%; margin: 0 auto; min-height: 200px; max-height: 300px; border: 1px solid #D0E5F5; border-radius: 5px;">
        {{-- Cabecera --}}
        <div style="width: 900px; overflow: hidden;">
            <table style="width: 98%;">
                <thead>
                    <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                        <th style="width: 100px;" class="centrado"><label>C&oacute;digo</label></th>
                        <th style="width: 600px;" class="izq"><label>Descripci&oacute;n</label></th>
                        <th style="width: 100px;"><label>Existencia</label></th>
                        <th style="width: 80px;" class="centrado"><label>Precio</label></th>
                    </tr>
                </thead>
            </table>
        </div>
        {{-- Contenido --}}
        <div style="overflow-y: scroll; overflow-x: hidden; max-height: 200px;">
            <table id="tab_datosproductos" style="width: 98%; margin: 0px; font-size: 13px;">
                <tbody>
                    <tr>
                        <td style="width: 100px; border: 1px solid #D0E5F5; margin-left: 1px;">Codigo</td>
                        <td style="width: 600px; border: 1px solid #D0E5F5;" class="izq">Descripcion</td>
                        <td style="width: 100px; border: 1px solid #D0E5F5;">Existencia</td>
                        <td style="width: 80px; border: 1px solid #D0E5F5;">Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                    <tr>
                        <td>Codigo</td>
                        <td>Descripcion</td>
                        <td>Existencia</td>
                        <td>Precio</td>
                    </tr>
                </tbody>
         </table>
        </div>
        {{-- Pie --}}
        <div style="overflow: hidden;"></div>
        
    </div>
    <div id="div_busqueda" style="width: 900px; margin: 0 auto; margin-top: 10px; margin-bottom: 10px; border: 1px solid #D0E5F5; height: 50px; border-radius: 5px;">
        
    </div>
    <div id="div_datospedidos" style="width: 900px; border: 1px solid #D0E5F5; border-radius: 5px; margin-bottom: 50px;">
        {{-- Cabecera --}}
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
        {{-- Contenido --}}
        <div style="overflow-y: scroll; overflow-x: hidden; max-height: 200px; " onscroll="OnScrollDiv(this)" id="DivMainContent">
            <table id="tab_datosregistro" style="width: 900px; margin: 0 auto;  font-size: 13px;">
                <tbody>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                        <td>Accion</td>
                    </tr>
                    
                </tbody>
         </table>
        </div>
        {{-- Pie --}}
        <div id="DivFooterRow" style="overflow:hidden">
        </div>
    </div>
</div>
@stop

@section('script')
{{ HTML::script('js/app/tomapedido.js') }}
{{ HTML::script('js/tablaHFija.js') }}
@stop