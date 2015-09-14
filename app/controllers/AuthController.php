<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthController
 *
 * @author Andreina
 */
class AuthController extends BaseController{
    public function mostrarLogin(){
        // Verificamos si hay sesion activa
        if(Auth::check()){
            // Si tenemos sesión activa mostrará el inicio
            //return Redirect::to('/principal');
            return Redirect::to('/inicio');
        }
        
        
        // Si no  hay sesión activa mostrará el login
        return View::make('index');
        //return Redirect::to('/login');
    }
    
    public function postLogin(){
        // Obtenemos los datos del formulario
        $data = [
           'email' => Input::get('email'),
           'password' => Input::get('password') 
        ];
        
        // comprabar validaciones
        
        
        // Verificamos los datos
        if(Auth::attempt($data)) // Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
        {
            // Si nuestros datos son correctos mostraremos la página principal
           return Redirect::intended('/inicio');
            //echo "Entro";
            //exit(0);
            
            //return Redirect::to('/entrada');
        }
        
        // Si los datos no son lo correctos volvemos a login con un mensaje de error
        return Redirect::back()->with('error_message','Email/Password Incorrecto')->withInput();
    }
    
    public function logOut(){
        // Cerramos la sesión
        Auth::logout();
        
        // Volvemos al login y mostramos un mensaje indicando que se cerro la sesión
        return Redirect::to('/login')->with('error_message','¡Gracias por usar nuestra aplicación!');
    }
}

?>
