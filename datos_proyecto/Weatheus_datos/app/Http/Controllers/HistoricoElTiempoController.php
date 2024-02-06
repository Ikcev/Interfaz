<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\APIElTiempoController;
use App\Models\WeatherData;
use Carbon\Carbon;

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
            // Obtener la hora actual redondeada
            $now = Carbon::now();
            $horaActualRedondeada = $now->minute(0)->second(0);

            // Agregar la hora redondeada a los datos meteorológicos
            $weatherData['hora_actual_redondeada'] = $horaActualRedondeada;

            // Insertar los datos en la base de datos
            HistoricoElTiempo::create($weatherData);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
