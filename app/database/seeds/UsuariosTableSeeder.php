<?php

use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder{
    public function run(){
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Dixon Acosta',
            'email' => 'cliente@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'rest-1964',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0244'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Mi Chinita',
            'email' => 'michinita@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0611',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0611'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Valentina',
            'email' => 'valentina@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0612',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0612'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Cristina',
            'email' => 'cristina@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0613',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0613'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Vanessa',
            'email' => 'vanessa@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0614',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0614'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Virginia',
            'email' => 'virginia@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0616',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0616'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Municipal del Sol',
            'email' => 'municipaldelsol@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0617',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0617'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Palaima',
            'email' => 'palaima@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI0618',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0618'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'OTC Farmacos',
            'email' => 'otcfarmacos@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLIB138',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => 'B138'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Veronica',
            'email' => 'veronica@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI2830',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '2830'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Camila',
            'email' => 'camila@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI4557',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '4557'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia San Marcos Nº 2',
            'email' => 'valentina@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI7468',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '7468'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Peru II',
            'email' => 'peruii@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLIQ119',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => 'Q119'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia Nuestra Señora del Pilar',
            'email' => 'senoradelpilar@hotmail.com',
            'password' => Hash::make('123456'),
            'Usuario_Wservices' => 'REST-CLI7136',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '7136'
        ]);
        
       User::create([
            'rol_id' => 2,
            'Nombre' => 'Dixon Acosta',
            'email' => 'administrador@hotmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}

?>
