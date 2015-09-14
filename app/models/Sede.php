<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sede
 *
 * @author Andreina
 */
class Sede extends Eloquent{
    protected $table = "sedes";
    protected $fillable = [
        'id',
    	'Codigo',
        'Nombre',
    	'Principal'
    ];
    
    public function pedido(){
        return $this->belongsTo('Pedido');
    }
    
    public function users(){
        return $this->belongsToMany('User');
    }
}

?>
