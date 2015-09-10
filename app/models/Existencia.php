<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Existencia
 *
 * @author Andreina
 */
class Existencia extends Eloquent{
    protected $table = "existencias";
    protected $fillable = [
        'Codigo',
        'CodigoBarra',
        'Precio',
        'Descuento',
        'Existencia'
     ];
}

?>
