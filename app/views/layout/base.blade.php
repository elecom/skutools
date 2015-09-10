<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema SkuTools - @yield('titulo')</title>
        {{ HTML::style('css/jquery-ui-1.10.3.custom.min.css') }}
        {{ HTML::style('css/jquery.notice.css') }}
        {{ HTML::style('css/styles.css') }}
    </head>
    <body>
        <div id="contenedor_principal">
            <div id="cabecera" style="width: 1200px; border: 1px solid #888; height: 100px; margin: 0 auto; margin-bottom: 10px;text-align: center;">
                <h1>Cabecera</h1>
            </div>
            <div id="menu">
                <ul class="nav">
                    <li><a href="#" style="color:#2e6e9e; font-weight: bold; " id="a_usuario">((<?php echo Auth::user()->email; ?>))</a>
                        {{--<ul>
                           <li><a href="{{ URL::to('logout') }}" id="cerrar_sesion" title="Presione aquí para cerrar la sesion actual">Salir</a></li>
                        </ul>--}}
                    </li>
                    <li><a href="{{ URL::to('logout') }}" title="Presione aquí para salir de la sesión">SALIR</a></li>
                </ul>
            </div>
            
            <div style="float: right; width: 230px;  background: #d0e5f5;padding: 5px; text-align: center; border: 1px solid #2e6e9e; font-size: 11px;">
                @if (Auth::user()->rol_id == 1)
                <i><strong><label>Cliente: </label><?php echo Auth::user()->Nombre; ?></strong></i>
                @else
                <i><strong><label>Administrador: </label><?php echo Auth::user()->Nombre; ?></strong></i>
                @endif
            </div>
            
            <div id="contenido">
                <div style="margin: 0 auto; width: 1100px; text-align:center; font-size:17px; font-style: italic; font-weight: bold; margin-bottom:30px; color: #2E6E9E;">
                        @yield('subtitulo')
                </div>
                <div style="margin: 0 auto; width: 140px; float: left; min-height: 400px; max-height: auto; border-radius: 3px; font-size: 11px;" >
                    <div id="navigation">
                        <ul class="top-level">
                            {{-- Página Principal de la Aplicación --}}
                            <li><a href="{{ URL::to('inicio') }}">Inicio</a></li>
                            
                            @if (Auth::user()->rol_id == 1)
                            
                            {{-- Entrada de Productos --}}
                            <li><a href="{{ URL::to('entrada') }}">Entradas</a></li>
                            
                            {{-- Pedido de Productos --}}
                            <li><a href="#">Pedido</a><span style="color: #2e6e9e">&gt;&gt;</span>
                                <ul class="sub-level">
                                    <li><a href="{{ URL::to('tomarpedido') }}">Tomar Pedido</a></li>
                                    <li><a href="#">Actualizar Pedido</a></li>
                                    <li><a href="#">Reporte Pedido</a></li>
                                </ul>
                            </li>
                            
                            @else
                            
                            <li><a href="#">Usuarios</a><span style="color: #2e6e9e">&gt;&gt;</span>
                                <ul class="sub-level">
                                    <li><a href="#">Nuevo Usuario</a></li>
                                    <li><a href="#">Activar/Desactivar Usuario</a></li>
                                </ul>
                            </li>
                            
                            @endif
                        </ul>
                      </div>
                </div>
                @yield('contenido')
                
            </div>
        </div>
        
        {{ HTML::script('js/jquery/jquery-1.8.1.min.js') }}
        {{ HTML::script('js/jquery/jquery-ui-1.10.3.custom.min.js') }}
        {{ HTML::script('js/jquery/jquery.blockUI.js') }}
        {{ HTML::script('js/jquery/jquery.notice.js') }}
        {{ HTML::script('js/jquery/jquery.numeric.js') }}
        @yield('script')
    </body>
</html>
