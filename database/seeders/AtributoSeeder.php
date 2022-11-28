<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
