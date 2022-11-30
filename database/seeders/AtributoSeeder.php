<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AtributoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atributos')->insert([
            'altura' => "1.80",
            'peso' => "74",
            'idade' => "21",
            'nivel_de_experiencia' => "Intermediário",
            'telefone' => "996752593",
        ]);
        DB::table('atributos')->insert([
            'altura' => "1.90",
            'peso' => "60",
            'idade' => "24",
            'nivel_de_experiencia' => "Avançado",
            'telefone' => "999999999",
        ]);
        DB::table('atributos')->insert([
            'altura' => "1.80",
            'peso' => "74",
            'idade' => "21",
            'nivel_de_experiencia' => "Intermediário",
            'telefone' => "998212044",
        ]);
    }
}
