<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'Trabajador(a) Social',
            'Psicólogo(a)',
            'Educador(a)',
            /* 'Pasante',
            'Voluntario(a)' */
        ];

        foreach($role as $key => $value){
            DB::table('roles')->insert([
                'name' => $value
            ]);
        }
    }
}
