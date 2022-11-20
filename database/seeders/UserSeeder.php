<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = ['edith@gmail.com']; // trabajadora social
        //$psicologo = ['luis@gmail.com'];
        $psicologa1 = ['patricia@gmail.com'];
        $psicologa2 = ['jasmine@gmail.com'];
        $psicologa3 = ['yissel@gmail.com'];
        $educadora = ['shara@gmail.com'];
        // $contraseña = ['12345678'];
        foreach($admin as $key => $valor){
            DB::table('users')->insert([
                'name' => 'Edith Artovar',
                'username' => 'edith',
                'role_id' => 1,
                'email' => $valor,
                'telefono' => '77777777',
                'direccion' => 'La Paz, calle xyz',
                'ci' => '00000000',
                'estado' => 1,
                'password' => Hash::make('123123'),
            ]);
        }

        foreach($psicologa1 as $key => $valor){
            DB::table('users')->insert([
                'name' => 'Patricia Poveda',
                'username' => 'patricia',
                'role_id' => 2,
                'email' => $valor,
                'telefono' => '',
                'direccion' => '',
                'ci' => '',
                'estado' => 1,
                'password' => Hash::make('123123'),
            ]);
        }

        foreach($psicologa2 as $key => $valor){
            DB::table('users')->insert([
                'name' => 'Jasmine Maceda',
                'username' => 'jasmine',
                'role_id' => 2,
                'email' => $valor,
                'telefono' => '',
                'direccion' => '',
                'ci' => '',
                'estado' => 1,
                'password' => Hash::make('123123'),
            ]);
        }

        foreach($psicologa3 as $key => $valor){
            DB::table('users')->insert([
                'name' => 'Yissel Calderon',
                'username' => 'yissel',
                'role_id' => 2,
                'email' => $valor,
                'telefono' => '',
                'direccion' => '',
                'ci' => '',
                'estado' => 1,
                'password' => Hash::make('123123'),
            ]);
        }

        /* foreach($psicologo as $key => $valor){
            DB::table('users')->insert([
                'name' => 'Luis Calvo Cortez',
                'username' => 'luis',
                'role_id' => 2,
                'email' => $valor,
                'telefono' => '',
                'direccion' => '',
                'ci' => '',
                'password' => Hash::make('123123'),
            ]);
        } */

        foreach($educadora as $key => $valor){
            DB::table('users')->insert([
                'name' => 'Shara Alarcon',
                'username' => 'shara',
                'role_id' => 3,
                'email' => $valor,
                'telefono' => '',
                'direccion' => '',
                'ci' => '',
                'estado' => 1,
                'password' => Hash::make('123456789shara'),
            ]);
        }
    }
}
