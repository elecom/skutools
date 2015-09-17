<?php

use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder{
    public function run(){
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'INV. MI CHINITA',
            'email' => 'inversiones_michinita@hotmail.com',
            'password' => Hash::make('12chinita34'),
            'Usuario_Wservices' => 'REST-CLI0611',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0611'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA VALENTINA',
            'email' => 'farmacia_valentina@cantv.net',
            'password' => Hash::make('12valentina34'),
            'Usuario_Wservices' => 'REST-CLI0612',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0612'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA CRISTINA',
            'email' => 'farmacia_cristina@cantv.net',
            'password' => Hash::make('12cristina34'),
            'Usuario_Wservices' => 'REST-CLI0613',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0613'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA VANESSA',
            'email' => 'farmacia_vanessa@cantv.net',
            'password' => Hash::make('12vanessa34'),
            'Usuario_Wservices' => 'REST-CLI0614',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0614'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA VIRGINIA',
            'email' => 'farmacia_virginia@cantv.net',
            'password' => Hash::make('12virginia34'),
            'Usuario_Wservices' => 'REST-CLI0616',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0616'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA EL SOL',
            'email' => 'farmacia_elsol@cantv.net',
            'password' => Hash::make('12elsol34'),
            'Usuario_Wservices' => 'REST-CLI0617',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0617'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA PALAIMA',
            'email' => 'farmacia_palaima@cantv.net',
            'password' => Hash::make('12palaima34'),
            'Usuario_Wservices' => 'REST-CLI0618',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '0618'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'OTC FARMACOS',
            'email' => 'otcfarmacos3@gmail.com',
            'password' => Hash::make('12otcfarmacos34'),
            'Usuario_Wservices' => 'REST-CLIB138',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => 'B138'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'I. SANSURF. VERONICA',
            'email' => 'farmacia_veronica@cantv.net',
            'password' => Hash::make('12veronica34'),
            'Usuario_Wservices' => 'REST-CLI2830',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '2830'
        ]);
        
        User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'FCIA CAMILA',
            'email' => 'farmacia_camila@cantv.net',
            'password' => Hash::make('12camila34'),
            'Usuario_Wservices' => 'REST-CLI4557',
            'Password_Wservices' => '12345678',
            'Codigo_Cliente' => '4557'
        ]);
        
       /* User::create([
            'rol_id' => 1,
            'sede_id' => 2,
            'Nombre' => 'Farmacia San Marcos Nº 2',
            'email' => 'sanmarcosn2@hotmail.com',
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
        ]);*/
        
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
            'rol_id' => 2,
            'Nombre' => 'Dixon Acosta',
            'email' => 'administrador@hotmail.com',
            'password' => Hash::make('12admin34')
        ]);
    }
}

?>
