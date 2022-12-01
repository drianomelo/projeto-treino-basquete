<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PessoaHasTreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas_has_treinos')->insert([
            'treino_id' => 1,
            'pessoa_id' => 1,
        ]);
        DB::table('pessoas_has_treinos')->insert([
            'treino_id' => 3,
            'pessoa_id' => 2,
        ]);

    }
}
