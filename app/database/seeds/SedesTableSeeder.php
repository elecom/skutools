<?php

class SedesTableSeeder extends Seeder{
    public function run(){
        Sede::create([
            "Codigo" => "DC",
            "Nombre" => "DROGUERÍA NENA GUARENAS",
            "Principal" => false
        ]);
        
        Sede::create([
            "Codigo" => "DN",
            "Nombre" => "DROGUERÍA NENA BARQUISIMETO",
            "Principal" => false
        ]);
    }    
}

?>
