<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use League\CommonMark\Extension\Table\Table;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Producto 1',
            'descripcion' => 'descripcion del producto 1',
            'precio' => 101,
            'categoria_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 2',
            'descripcion' => 'descripcion del producto 2',
            'precio' => 1045,
            'categoria_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'Producto 3',
            'descripcion' => 'descripcion del producto 3',
            'precio' => 1000,
            'categoria_id' => 3
        ]);
    }
}
