<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesi&oacute;n</title>
        {{ HTML::style('css/jquery-ui-1.10.3.custom.min.css') }}
        <style type="text/css">
            /* Elementos */
            
            body{
                font-family: Arial, Verdana, Geneva, sans-serif;
            }
	    
	    #lblCedula{
		font-style: italic;
	    }
	    
	    /* Identificadores */
	    #contenedor{
                width: 500px;
                height: auto;
		min-height: 200px;
                border: 1px solid #166294;
                border-radius: 10px;
		box-shadow: 0px 0px 30px #888;
                margin: auto;
                margin-top: 30px;
	    }
            
            #datosSuscriptor{
                width: 400px;
                height: auto;
                margin: auto;
                /*border: 1px solid #166294;*/
                padding: 3px;
                margin-top: 30px;
		margin-bottom: 20px;
		/*border-radius: 10px;*/
	    }
            
	    #datosProyecto{
		border-radius: 10px;
	    }
	    
	    #tabDatosUsuario{
		width: 250px;
		margin: auto;
	    }
	    
	    #tabDatosUsuario1{
		margin: auto;
	    }
	    
	    #tabDatosSuscriptor, #tabDatosSuscriptor2, #tabDatosInscripcion, #tabDatosProyecto{
		margin-top: 20px;
	    }
	    
	    #tabInscripcion thead th, #tabSuscriptor thead th{
		background: #CCC;
		color: #FFF;
	    }
	    
            #div_sesion, #div_consulta{
                margin: auto;
                margin-top: 30px;
            }
            
            #tab_seleccionar, #tab_visor{
                margin: auto;
                margin-top: 30px;
            }
            
            #tab_visor{
                
            }
            
	    #botones{
                margin: auto;
                width: 250px;
                text-align: center;
		margin-top: 50px;
                margin-bottom: 30px;
	    }
            
            /* Clases */
	    
	    .colIzq{
		text-align: right;
		font-style: italic;
		/*background-color: rgb(67, 216, 253);*/
		/*background-color: rgba(147, 207, 241, 0.84);*/
		background-color: #d0e5f5;
		/*color: #fff;*/
		color: #2e6e9e;
		padding-right:10px;
		width: 100px;
	    }
	    
	    .etiq{
		font-family: "Helvetica";
		font-size: 12px;
	    }
	    
	    .fondo-input{
		background-color: rgb(255, 255, 255);
	    }
	    
	    .centrado{
		text-align: center;
	    }
	    
	    .izq{
		text-align: left;
	    }
	    
	    .der{
		text-align: right;
	    }
	    
	    .jutificado{
		text-align: justify;
	    }
	    
	    .ocultar{
		display: none;
	    }
	    
	    .mostrar{
		display: block;
	    }
	    
	    .titulo{
		font-family: "Helvetica";
		display: block;
		font-size: 20px;
		font-weight: 400;
		text-align: center;
		padding: 2px;
	    }
	    
	    .titulo-principal{
		font-family: "Helvetica";
		display: block;
		font-size: 16px;
		text-align:center;
		font-weight: bold;
	    }
	    .fondo-titulos{
		background: #485AE7;
		color: #fff;
	    }
	    .fondo-titulo-principal{
		/*background: rgba(147, 207, 241, 0.84);*/
		background-color: #d0e5f5;
		/*color: #fff;*/
		color: #2e6e9e;
		border-top-left-radius: 10px;
		border-top-right-radius: 10px;
		/*text-shadow: 0.1em 0.1em 0.2em #333;*/
		text-shadow: 0.1em 0.2em 0.6em #333;
		padding: 5px;
	    }
		
		.fondo-titulo-footer{
		font-family: Arial;
		/*font-style: italic;*/
		font-weight: bold;
		font-size: 10px;
		text-align: center;
		/*background: rgba(147, 207, 241, 0.84);*/
		background-color: #d0e5f5;
		/*color: #fff;*/
		color: #2e6e9e;
		padding: 5px;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		text-shadow: 0.1em 0.2em 0.6em #333;
		margin-top: 30px;
	    }
		
	    .originalTextareaInfo {
                font-size: 12px;
		color: #000000;
		font-family: Tahoma, sans-serif;
		text-align: right
	    }
	    
	    .warningInfo {
		font-size: 12px;
                color: #FF0000;
		font-family: Tahoma, sans-serif;
		text-align: right
	    }
	    .negrita{
		font-weight: bold;
	    }
	</style>
        
    </head>
    <body>
        <div style="width: 490px;margin: 0 auto;">
            @if(Session::has('error_message'))
            <p class="centrado" style="background-color: #d0e5f5; padding: 10px; border-radius: 5px; border: 1px solid #166294;">
                {{ Session::get('error_message') }}
            </p>
            @endif
        </div>
        <div id="contenedor">
            <span class="titulo fondo-titulo-principal">Acceso a SkuTools</span>
            <form method="POST" action="verificar">
            <div id="div_sesion">
                <table id="tabDatosUsuario">
                    <tbody>
                        <tr>
                            <td><img src="img/correo.ico"/></td>
                            <td><label for='email'>Email:</label></td>
                            <td><input type="text" name='email' id='email' class="centrado" title="Ingrese el email del usuario."/></td>
                        </tr>
                        <tr>
                            <td><img src="img/llave.ICO"/></td>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" name='password' id='password' class="centrado" title="Ingrese el password del usuario."/></td>
                        </tr>
                    </tbody>
                </table>
                <div id="botones">
                    <input type="submit" id="btnEntrar" value="Entrar"/>
                </div>
                </form>
            </div>
            
            
        </div>
        
        {{ HTML::script('jquery/jquery-1.8.1.min.js') }}
        {{ HTML::script('jquery/jquery-ui-1.10.3.custom.min.js') }}
        {{ HTML::script('jquery/jquery.blockUI.js') }}
        {{ HTML::script('jquery/jquery.notice.js') }}
        {{ HTML::script('js/app/login.js') }}
    </body>
</html>
