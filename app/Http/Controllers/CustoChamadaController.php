<?php

namespace App\Http\Controllers;

use App\CustoChamada;
use App\Plano;
use Illuminate\Http\Request;

class CustoChamadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustoChamada  $custoChamada
     * @return \Illuminate\Http\Response
     */
    public function show(CustoChamada $custoChamada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustoChamada  $custoChamada
     * @return \Illuminate\Http\Response
     */
    public function edit(CustoChamada $custoChamada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustoChamada  $custoChamada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustoChamada $custoChamada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustoChamada  $custoChamada
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustoChamada $custoChamada)
    {
        //
    }

    public function consultaValor(Request $request)
    {
        $custoChamada = CustoChamada::where('origem', $request->origem)
            ->where('destino', $request->destino)->first();

        if (is_null($custoChamada))
            return back()->with('error', 'Valor para este conjunto de origem e destino não encontrado');

        $plano = Plano::find($request->plano);

        $valorMinutosExcedentes = $custoChamada->valor_minuto + ($custoChamada->valor_minuto * ($plano->porcentagem_acrescimo/100));

        $minutosExcedentes = $this->time_to_decimal($request->tempo) - $plano->minutos_gratis;
        if ($minutosExcedentes > 0)
            $valorPagoComPlano = $minutosExcedentes * $valorMinutosExcedentes;

        $valorPagoSemPlano = $this->time_to_decimal($request->tempo) * $custoChamada->valor_minuto;

//        redirect()->route('login');
//        back()->with(
        return redirect()->route('home')->with(
            ['success' => [
                'origem' => $request->origem,
                'destino' => $request->destino,
                'tempo' => $request->tempo,
                'plano' => $plano->descricao,
                'valor_com_plano' => $valorPagoComPlano ?? 0,
                'valor_sem_plano' => $valorPagoSemPlano,
            ]
            ]
        );
    }

    private function time_to_decimal($time) {
        $timeArr = explode(':', $time);
        $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2] ?? 0/60);

        return $decTime;
    }
}
