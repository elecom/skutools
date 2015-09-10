<?php 
	class Producto extends Eloquent{
		protected $table = "productos";
                protected $fillable = [
                    'Codigo',
                    'CodigoBarra',
                    'CodigoLaboratorio',
                    'Nombre',
                    'Tipo',
                    'Condicion',
                    'GravaImpuesto',
                    'Fragil',
                    'Refrigerado',
                    'Toxico',
                    'PrincipioActivo',
                    'Clase',
                    'Nuevo',
                    'Marca',
                    'ISV',
                    'UMF',
                    'PorcentajeUMF',
                    'Ingreso',
                    'Administrado'
            ];
                
            public function detalles(){
                return $this->hasMany('Detalle');
            }
                
            public function inventarios(){
                return $this->belongsToMany('Inventario')->withPivot('created_at','updated_at');
            }
	}