<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChequeoProducto
 *
 * @author Andreina
 */
class ChequeoProducto extends Eloquent {
    protected $table = "chequeo_productos";
    protected $fillable = [
        'fecha',
        'hora',
        'created_at',
        'updated_at'
     ];
}

?>
