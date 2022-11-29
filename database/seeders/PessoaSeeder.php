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
            'posicao' => "Point Guard",
        ]);
    }
}
