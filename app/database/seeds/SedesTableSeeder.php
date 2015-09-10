<?php

class SedesTableSeeder extends Seeder{
    public function run(){
        Sede::create([
            "Codigo" => "DC",
            "Nombre" => "SUCURSAL",
            "Principal" => false
        ]);
        
        Sede::create([
            "Codigo" => "DN",
            "Nombre" => "PRINCIPAL",
            "Principal" => false
        ]);
    }    
}

?>
