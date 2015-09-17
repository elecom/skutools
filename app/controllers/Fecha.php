<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fecha
 *
 * @author Andreina
 */
class Fecha {
        static function arreglarFecha($fecha){
            $f = explode('/', $fecha);
            return $f[2].'-'.$f[1].'-'.$f[0];
        }
        
        static function arreglarFecha2($fecha){
            $f = explode('-', $fecha);
            return $f[2].'-'.$f[1].'-'.$f[0];
        }
        
        static function arreglarFecha3($fecha){
            $f = explode('-', $fecha);
            return $f[2].$f[1].$f[0];
        }


        static function calcularEdad($fechaNac){
            list($Y,$m,$d) = explode("-", $fechaNac);
            return (date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y);
        }
        
        static function calcularEdad2($fechaNac){
            list($Y,$m,$d) = explode("/", $fechaNac);
            return (date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y);
        }
        static function fechaActual(){
            $fecha = date('d-m-Y');
            return $fecha;
        }
        
        static function horaActual(){
            $hora = getdate();
            
             
        }
}

?>
