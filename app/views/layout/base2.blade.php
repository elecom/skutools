<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Farma Web - @yield('titulo')</title>
        {{--<!--<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.10.3.custom.min.css" />-->--}}
        {{ HTML::style('css/jquery-ui-1.10.3.custom.min.css') }}
        {{ HTML::style('bootstrap/css/bootstrap.min.css') }}
        {{--<!--<link rel="stylesheet" type="text/css" href="../../css/messi.min.css"/>-->--}}
        {{ HTML::style('css/jquery.notice.css') }}
        {{ HTML::style('css/styles.css') }}

    </head>
    <body>
            <!--<div style="float: right; width: 230px;  background: #d0e5f5;padding: 5px; text-align: center; border: 1px solid #2e6e9e; font-size: 11px;">
                <i>Usuario: <strong>Dixon Acosta</strong></i>
            </div>-->
            
            <div id="contenido">
                {{--<!--<img src="img/fondo.png" />-->--}}
                @yield('contenido')
            </div>
        </div>
        
        {{ HTML::script('js/jquery/jquery-1.8.1.min.js') }}
        {{ HTML::script('js/jquery/jquery-ui-1.10.3.custom.js') }}
        {{ HTML::script('js/jquery/jquery.blockUI.js') }}
        {{ HTML::script('js/jquery/jquery.notice.js') }}
        {{ HTML::script('js/jquery/jquery.numeric.js') }}
        @yield('script')
    </body>
</html>
