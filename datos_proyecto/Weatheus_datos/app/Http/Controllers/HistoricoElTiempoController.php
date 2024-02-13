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
    public function store(array $weatherData)
    {
        $currentHour = round(date("H"));
        try {
            \Illuminate\Support\Facades\Log::info('Temperatura: ' . $weatherData['array_sens_termica'][$currentHour]);
    
            HistoricoElTiempo::create([
                'estadoCielo' => $weatherData['array_estado_cielo'][$currentHour] == "" ? 0 : $weatherData['array_estado_cielo'][$currentHour],
                'precipitacion' => $weatherData['array_precipitacion'][$currentHour] == "" ? 0 : $weatherData['array_precipitacion'][$currentHour],
                'temp' => $weatherData['temperatura_actual'],
                'tempMax' => $weatherData['temperaturas_max'],
                'tempMin' => $weatherData['temperaturas_min'],
                'humedad' => $weatherData['array_humedad_relativa'][$currentHour] == "" ? 0 : $weatherData['array_humedad_relativa'][$currentHour],
                'sensTermica' => $weatherData['array_sens_termica'][$currentHour] == "" ? 0 : $weatherData['array_sens_termica'][$currentHour],
                'dirViento' => $weatherData['array_direccion_viento'][$currentHour] == "" ? 0 : $weatherData['array_direccion_viento'][$currentHour],
                'velViento' => $weatherData['array_velocidad_viento'][$currentHour] == "" ? 0 : $weatherData['array_velocidad_viento'][$currentHour],
                'horaActual' => $weatherData['hora_actual_redondeada'],
                'idMunicipio' => $weatherData['municipio'],
                ]);
        
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
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

    public function insercionRegistroElTiempo(){

    }
}
