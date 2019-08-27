<?php

namespace App\Http\Controllers;

use App\CustoChamada;
use App\Plano;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $planos  = Plano::all()->pluck('descricao', 'id');
        $origens = CustoChamada::select('origem')->distinct()->get()->pluck('origem', 'origem');
        $destinos = CustoChamada::select('destino')->distinct()->get()->pluck('destino', 'destino');

        return view('home', compact('planos', 'origens', 'destinos'));
    }
}
