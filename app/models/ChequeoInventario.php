<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChequeoInventario
 *
 * @author Andreina
 */
class ChequeoInventario extends Eloquent{
    protected $table = "chequeo_inventarios";
    protected $fillable = [
        'fecha',
        'hora',
        'created_at',
        'updated_at'
     ];
}

?>
