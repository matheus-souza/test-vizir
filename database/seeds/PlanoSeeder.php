<?php

use Illuminate\Database\Seeder;
use App\Plano;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'descricao' => 'FaleMais 30', 'minutos_gratis' => 30, 'porcentagem_acrescimo' => 10],
            ['id' => 2, 'descricao' => 'FaleMais 60', 'minutos_gratis' => 60, 'porcentagem_acrescimo' => 10],
            ['id' => 3, 'descricao' => 'FaleMais 120', 'minutos_gratis' => 120, 'porcentagem_acrescimo' => 10],
        ];

        foreach ($data as $item) {
            Plano::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
