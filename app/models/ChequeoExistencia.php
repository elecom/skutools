<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChequeoExistencias
 *
 * @author Andreina
 */
class ChequeoExistencias extends Eloquent{
    protected $table = "chequeo_existencias";
    protected $fillable = [
        'CodigoProducto',
        'CodigoBarra',
        'fecha'
     ];
}

?>
