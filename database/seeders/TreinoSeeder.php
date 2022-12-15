<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TreinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treinos')->insert([
            'horario_inicio' => "15:00",
            'horario_fim' => "18:00",
            'endereco' => "UFS",
            'modalidade_id' => 1,
        ]);
        DB::table('treinos')->insert([
            'horario_inicio' => "21:00",
            'horario_fim' => "23:00",
            'endereco' => "UNIT",
            'modalidade_id' => 3,
        ]);
        DB::table('treinos')->insert([
            'horario_inicio' => "19:00",
            'horario_fim' => "20:00",
            'endereco' => "Codap",
            'modalidade_id' => 2,
        ]);
    }
}
