<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustoChamada extends Model
{
    protected $fillable = [
        'origem',
        'destino',
        'valor_minuto',
    ];
}
