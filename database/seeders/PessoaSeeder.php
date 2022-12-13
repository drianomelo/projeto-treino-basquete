<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->insert([
            'nome' => "Adriano Melo",
            'posicao' => "SG",
            'nivel' => "Iniciante",
            'atributo_id' => 1,
        ]);
        DB::table('pessoas')->insert([
            'nome' => "Rodrygo Santos",
            'posicao' => "C",
            'nivel' => "Intermediário",
            'atributo_id' => 2,
        ]);
        DB::table('pessoas')->insert([
            'nome' => "Adriel Melo",
            'posicao' => "PG",
            'nivel' => "Avançado",
            'atributo_id' => 3,
        ]);
    }
}
