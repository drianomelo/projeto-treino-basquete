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
            'atributo_id' => 1,
            'posicao_id' => 1,
        ]);
        DB::table('pessoas')->insert([
            'nome' => "Rodrygo Santos",
            'atributo_id' => 2,
            'posicao_id' => 2,
        ]);
        DB::table('pessoas')->insert([
            'nome' => "Adriel Melo",
            'atributo_id' => 3,
            'posicao_id' => 3,
        ]);
    }
}
