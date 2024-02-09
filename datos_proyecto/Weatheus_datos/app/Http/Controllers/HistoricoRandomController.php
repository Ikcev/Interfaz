<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoricoRandomController extends Controller
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
        $datosAleatorios = HistoricoRandomController::generarDatosAleatorios();
        
        $now = Carbon::now();
        $horaActualRedondeada = $now;
        
        try
        {
            HistoricoRandom::create([
                'estadoCielo' => $datosAleatorios['estadoCielo'],
                'precipitacion' => $datosAleatorios['precipitacion'],
                'temp' => $datosAleatorios['temp'],
                'humedad' => $datosAleatorios['humedad'],
                'sensTermica' => $datosAleatorios['sensTermica'],
                'dirViento' => $datosAleatorios['dirViento'],
                'velViento' => $datosAleatorios['velViento'],
                'horaActual' => $horaActualRedondeada,
                'idMunicipio' => $datosAleatorios['idMunicipio'],
            ]);
            return response()->json(['success' => true]);
        }catch (ModelNotFounException $e){
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

    public static function generarDatosAleatorios(int $temperaturas_max, $temperaturas_min, $idMunicipio)
    {
        return [
            'estadoCielo' => rand(0, 100),
            'precipitacion' => rand(0, 100),
            'temp' => rand($temperaturas_max, $temperaturas_min) + (float)rand(0, 99) / 100,
            'humedad' => rand(0, 100),
            'sensTermica' => rand(-10, 40),
            'dirViento' => ['Norte', 'Sur', 'Este', 'Oeste'][rand(0, 3)],
            'velViento' => rand(0, 50),
            'idMunicipio' => $idMunicipio,
        ];
    }
}
