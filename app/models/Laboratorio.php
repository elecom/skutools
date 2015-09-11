<?php

/**
 * Description of Laboratorio
 *
 * @author Andreina
 */
class Laboratorio extends Eloquent{
        protected $table = "laboratorios";
        protected $fillable = [
                'id',
                'Codigo',
                'Nombre',
                'created_at',
                'updated_at'
        ];
    
        public function productos(){
            return $this->hasMany('Producto');
        }    
}

?>
