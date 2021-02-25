<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name'=>'',
        'email'=>'',
        'password'=>'',	  

        'email'=>'rominacodarin@gmail.com',       
        'organizacion'=>'orga',
        'nombre'=>'Romina',
        'apellido'=>'Codarin',
        'dni'=>'26666804',
        'pasaporte'=>'',
        'otra_identificacion'=>'',
        'identidad'=>'mujer',
        'otra_identidad'=>'',
        'fecha_nacimiento'=>'28-08-1978',
        'nivel_educativa'=>'Universitaria',
        'completo_estudios'=>'Si',
        'calle'=>'El Jilguero',
        'numero'=>'2459',
        'torre'=>'',
        'piso'=>'',
        'departamento'=>'',
        'localidad'=>'Paso del Rey',
        'partido'=>'Moreno',
        'provincia'=>'Provincia',
        'correo_electronico'=>'rominacodarin@gmail.com',
        'telefono'=>'',     	

        ]);
        //
    }
}
