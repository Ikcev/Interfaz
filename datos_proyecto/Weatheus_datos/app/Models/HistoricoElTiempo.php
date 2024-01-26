<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoElTiempo extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'estadoCielo',
        'precipitacion',
        'temp',
        'tempMax',
        'tempMin',
        'humedad',
        'sensTermica',
        'dirViento',
        'velViento',
        'idMunicipio'
    ];
}
