<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(array(
            AtributoSeeder::class,
            ModalidadeSeeder::class,
            PessoaHasTreinoSeeder::class,
            PessoaSeeder::class,
            TreinoSeeder::class,
        ));


    }
}
