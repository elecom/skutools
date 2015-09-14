<?php

class RolesTableSeeder extends Seeder{
    public function run(){
        Rol::create([
           "Codigo" => "CLI",
           "Descripcion" => "CLIENTE"
        ]);
        
        Rol::create([
           "Codigo" => "ADM",
           "Descripcion" => "ADMINISTRADOR"
        ]);
    }
}

?>
