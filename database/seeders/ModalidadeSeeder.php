<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidades')->insert([
            'nome' => "Basquete",
        ]);
        DB::table('modalidades')->insert([
            'nome' => "Vôlei",
        ]);
        DB::table('modalidades')->insert([
            'nome' => "Handebol",
        ]);
    }
}
