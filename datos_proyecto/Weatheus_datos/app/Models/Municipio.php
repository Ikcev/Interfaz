<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'idMunicipio',
        'locId',
        'idProvincia'
    ];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'idProvincia');
    }
}
