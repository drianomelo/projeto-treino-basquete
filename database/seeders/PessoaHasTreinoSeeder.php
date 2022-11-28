<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'pessoas_id' => 1,
            'treinos_id' => 1,
        ]);
    }
}
