<?php

namespace Tests\Feature;

use App\CustoChamada;
use App\Plano;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculaChamadaTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * Testa se está acessando a página inicial
     *
     * @return void
     */
    public function testAcessoHome()
    {
        $response = $this->get(route('home'));

        $response->assertSuccessful();
        $response->assertViewIs('home');
    }

    /**
     * Testa se os planos padrões foram inseridos
     *
     * @return void
     */
    public function testInsertPlanosDefault()
    {
        $this->seed();

        $this->assertEquals(3, Plano::count());
    }

    /**
     * Testa se os valores de chamadas padrão foram inseridos
     *
     * @return void
     */
    public function testInsertCustoChamadaDefault()
    {
        $this->seed();

        $this->assertEquals(6, CustoChamada::count());
    }

    /**
     * Testa o cálculo do custo de chamada a partir da orige, destino, tempo e plano
     *
     * @return void
     */
    public function testCalculoChamada()
    {
        $this->seed();

        $data = [
            ['origem' => '011', 'destino' => '016', 'tempo' => '00:20', 'plano' => 1, 'response' => ['valor_com_plano' => 0, 'valor_sem_plano' => 38.0]],
            ['origem' => '011', 'destino' => '017', 'tempo' => '01:20', 'plano' => 2, 'response' => ['valor_com_plano' => 37.4, 'valor_sem_plano' => 136.0]],
            ['origem' => '018', 'destino' => '011', 'tempo' => '03:20', 'plano' => 3, 'response' => ['valor_com_plano' => 167.20, 'valor_sem_plano' => 380.0]],
        ];

        foreach ($data as $item) {
            $response = $this->post(route('valorchamada'), $item);

            $response->assertRedirect(route('home'));

            $plano = Plano::find($item['plano']);

            $response->assertSessionHas('success', [
                'origem' => $item['origem'],
                'destino' => $item['destino'],
                'tempo' => $item['tempo'],
                'plano' => $plano->descricao,
                'valor_com_plano' => $item['response']['valor_com_plano'],
                'valor_sem_plano' => $item['response']['valor_sem_plano'],
            ]);
        }
    }


}
