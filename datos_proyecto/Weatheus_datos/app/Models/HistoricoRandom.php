<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoRandom extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'estadoCielo',
        'precipitacion',
        'temp',
        'humedad',
        'sensTermica',
        'dirViento',
        'velViento',
        'idMunicipio'
    ];
}
