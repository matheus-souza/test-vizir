<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = [
        'descricao',
        'minutos_gratis',
        'porcentagem_acrescimo',
    ];
}
