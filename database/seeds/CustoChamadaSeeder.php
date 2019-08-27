<?php

use Illuminate\Database\Seeder;
use App\CustoChamada;

class CustoChamadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'origem' => '011', 'destino' => '016', 'valor_minuto' => 1.90],
            ['id' => 2, 'origem' => '016', 'destino' => '011', 'valor_minuto' => 2.90],
            ['id' => 3, 'origem' => '011', 'destino' => '017', 'valor_minuto' => 1.70],
            ['id' => 4, 'origem' => '017', 'destino' => '011', 'valor_minuto' => 2.70],
            ['id' => 5, 'origem' => '011', 'destino' => '018', 'valor_minuto' => 0.90],
            ['id' => 6, 'origem' => '018', 'destino' => '011', 'valor_minuto' => 1.90],
        ];

        foreach ($data as $item) {
            CustoChamada::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
