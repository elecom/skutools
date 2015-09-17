<?php
class Inventario extends Eloquent{
        protected $table = "inventarios";
        protected $fillable = [
                'id',
                'user_id',
                'Codigo',
                'Precio',
                'Descuento',
                'Entrada',
    		'Existencia',
    		'DescuentoUFI',
    		'DescuentoEmpaque',
                'UnidadEmpaque',
                'DescuentoComercial',
                'DescuentoProntoPago',
                'Lote',
                'Vencimiento',
                'UnidadManejo',
                'FechaVenta',
                'Nuevo',
                'EnPromocion',
                'CodigoPromocion'
    	];
        
        public function user(){
            return $this->belongsTo('User');
        }
        
        public function productos(){
            return $this->belongsToMany('Producto')->withPivot('created_at','updated_at');
        }
}