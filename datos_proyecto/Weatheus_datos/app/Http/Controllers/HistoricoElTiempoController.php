<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\APIElTiempoController;
use App\Models\HistoricoElTiempo;


class HistoricoElTiempoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function insercionRegistroElTiempo(array $weatherData){
        try {
            \Illuminate\Support\Facades\Log::info('Temperatura: ' . $weatherData['array_sens_termica'][round(date("H"))]);

            HistoricoElTiempo::create([
                'estadoCielo' => $weatherData['array_estado_cielo'][round(date("H"))],
                'precipitacion' => $weatherData['array_precipitacion'][round(date("H"))],
                'temp' => $weatherData['temperatura_actual'],
                'tempMax' => $weatherData['temperaturas_max'],
                'tempMin' => $weatherData['temperaturas_min'],
                'humedad' => $weatherData['array_humedad_relativa'][round(date("H"))],
                'sensTermica' => $weatherData['array_sens_termica'][round(date("H"))],
                'dirViento' => $weatherData['array_direccion_viento'][round(date("H"))],
                'velViento' => $weatherData['array_velocidad_viento'][round(date("H"))],
                'horaActual' => $weatherData['hora_actual_redondeada'],
                'idMunicipio' => $weatherData['municipio'],
            ]);
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
