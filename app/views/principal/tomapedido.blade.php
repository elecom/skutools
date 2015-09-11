@extends('layout.base')
@section('titulo') Pedidos @stop
@section('subtitulo') TOMAR PEDIDO @stop

@section('contenido')
<div style="width: 900px; margin: 0 auto; text-align: center;">
    <div id="div_datosproductos" style="width: 900px; margin: 0 auto; min-height: 200px; max-height: 300px; border: 1px solid #D0E5F5; overflow-y: scroll; border-radius: 5px;">
        <!-- Cabecera de tabla -->
        <div style="width: 900px; overflow: hidden;">
            
        </div>
        <div style="overflow: scroll;"></div>
        <div></div>
        <table id="tab_datosproductos" style="width: 900px; margin: 0 auto; font-size: 13px;">
            <thead>
                <tr style="background-color: #D0E5F5; color: #2E6E9E;">
                    <!--<th style="width: 80px;" class="centrado"><label>C&oacute;digo</label></th>-->
                    <th style="width: 100px;" class="centrado"><label>C&oacute;digo</label></th>
                    <th style="width: 500px;" class="izq"><label>Descripci&oacute;n</label></th>
                    <th style="width: 120px;"><label>Existencia</label></th>
                    <th style="width: 100px;" class="centrado"><label>Precio</label></th>
                </tr>
            </thead>
            <tbody>
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
                <tr>
                    <td>Codigo</td>
                    <td>Descripcion</td>
                    <td>Existencia</td>
                    <td>Precio</td>
                </tr>
            </tbody>
     </table>
    </div>
    <div id="div_busqueda" style="width: 900px; margin: 0 auto; margin-top: 10px; margin-bottom: 10px; border: 1px solid #D0E5F5; height: 50px; border-radius: 5px;">
        
    </div>
    <div id="div_datospedidos" style="width: 900px; border: 1px solid #D0E5F5; border-radius: 5px; margin-bottom: 50px;">
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

        <div style="overflow-y: scroll; overflow-x: hidden; max-height: 200px; " onscroll="OnScrollDiv(this)" id="DivMainContent">
            <!--Place Your Table Heare-->
            <!--<table><tr><td>.......</td></tr></table>-->
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

        <div id="DivFooterRow" style="overflow:hidden">
        </div>
    </div>
</div>
@stop

@section('script')
{{ HTML::script('js/app/tomapedido.js') }}
{{ HTML::script('js/tablaHFija.js') }}
@stop