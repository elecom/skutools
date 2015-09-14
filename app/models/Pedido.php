<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author Andreina
 */
class Pedido extends Eloquent{
    protected $table = "pedidos";
    protected $fillable = [
        'id',
        'sede_id',
    	'NumeroPedido',
        'CodigoCliente',
    	'DescuentoNegociado',
        'Status',
    	'Enviado',
        'created_at',
        'updated_at'
    ];
    
    public function detalles(){
        return $this->hasMany('Detalle');
    }
    
    public function sede(){
        return $this->hasOne('Sede');
    }
}

?>
