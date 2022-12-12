<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PosicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posicaos')->insert([
            'nome' => "Point Guard",
        ]);
        DB::table('posicaos')->insert([
            'nome' => "Shooting Guard",
        ]);
        DB::table('posicaos')->insert([
            'nome' => "Small Forward",
        ]);
        DB::table('posicaos')->insert([
            'nome' => "Power Forward",
        ]);
        DB::table('posicaos')->insert([
            'nome' => "Center",
        ]);
    }
}
