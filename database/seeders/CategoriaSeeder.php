<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert([
            'categoria' => 'Farmacia',
            'descripcion' => 'productos de farmacia como medicamentos etc'
        ]);

        DB::table('categoria')->insert([
            'categoria' => 'Abarrotes',
            'descripcion' => 'todo lo relacionado a productos basicos'
        ]);

        DB::table('categoria')->insert([
            'categoria' => 'alimentos',
            'descripcion' => 'alimentos para mascotas'
        ]);

        
    }
}
