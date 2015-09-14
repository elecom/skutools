<?php


class Rol extends Eloquent{
    protected $table="roles";
    protected $fillable = [
        'id',
        'Codigo',
        'Descripcion'
    ];
}

?>
