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
            'quadra_id' => 1,
        ]);
    }
}
