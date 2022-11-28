<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'posicao' => "Point Guard",
            'quadra_id' => 1,
        ]);
    }
}
