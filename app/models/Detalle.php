<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoDetalle
 *
 * @author Andreina
 */
class Detalle extends Eloquent{
    protected $table = "detalles";
    protected $fillable = [
        'id',
        'pedido_id',
        'producto_id',
    	'NumeroPedido',
        'CodigoProducto',
    	'Cantidad',
        'DescuentoNegociado',
        'created_at',
        'updated_at'
    ];
    
    public function pedido(){
        return $this->belongsTo('Pedido');
    }
    
    public function producto(){
        return $this->belongsTo('Producto');
    }
}

?>
