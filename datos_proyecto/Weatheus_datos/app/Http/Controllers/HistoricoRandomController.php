<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\HistoricoRandom;

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
    public function store(array $datosAleatorios)
    {   
        $now = Carbon::now();
        $horaActualRedondeada = $now;

        \Illuminate\Support\Facades\Log::info('H' . $datosAleatorios[count($datosAleatorios)-1]['estadoCielo']);

        try {
            \Illuminate\Support\Facades\Log::info('Algo');
            HistoricoRandom::create([
                'estadoCielo' => $datosAleatorios[count($datosAleatorios)-1]['estadoCielo'],
                'precipitacion' => $datosAleatorios[count($datosAleatorios)-1]['precipitacion'],
                'temp' => $datosAleatorios[count($datosAleatorios)-1]['temp'],
                'humedad' => $datosAleatorios[count($datosAleatorios)-1]['humedad'],
                'sensTermica' => $datosAleatorios[count($datosAleatorios)-1]['sensTermica'],
                'dirViento' => $datosAleatorios[count($datosAleatorios)-1]['dirViento'],
                'velViento' => $datosAleatorios[count($datosAleatorios)-1]['velViento'],
                'horaActual' => $horaActualRedondeada,
                'idMunicipio' => $datosAleatorios[count($datosAleatorios)-1]['idMunicipio'],
            ]);

            \Illuminate\Support\Facades\Log::info('Alguito');

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

    public function generarDatosAleatorios(int $temperaturas_max, int $temperaturas_min, int $idMunicipio)
    {

        \Illuminate\Support\Facades\Log::info('Hola');

        $datosGenerados = [];

        $estadoCielo = rand(0, 100);
        \Illuminate\Support\Facades\Log::info($estadoCielo);
        $precipitacion = rand(0, 100);
        \Illuminate\Support\Facades\Log::info($precipitacion);
        
        $temperaturaBase = rand($temperaturas_min, $temperaturas_max);
        \Illuminate\Support\Facades\Log::info($temperaturaBase);
        $decimalTemperatura = (float)rand(0, 99) / 100;
        \Illuminate\Support\Facades\Log::info($decimalTemperatura);
        $temp = $temperaturaBase + $decimalTemperatura;
        \Illuminate\Support\Facades\Log::info($temp);
        
        $humedad = rand(0, 100);
        \Illuminate\Support\Facades\Log::info($humedad);
        $sensTermica = rand(-10, 40);
        \Illuminate\Support\Facades\Log::info($sensTermica);
        $dirViento = ['Norte', 'Sur', 'Este', 'Oeste'][rand(0, 3)];
        \Illuminate\Support\Facades\Log::info($dirViento);
        $velViento = rand(0, 50);
        \Illuminate\Support\Facades\Log::info($velViento);

        $datosGenerados[] = [
            'estadoCielo' => $estadoCielo,
            'precipitacion' => $precipitacion,
            'temp' => $temp,
            'humedad' => $humedad,
            'sensTermica' => $sensTermica,
            'dirViento' => $dirViento,
            'velViento' => $velViento,
            'idMunicipio' => $idMunicipio,
        ];

        \Illuminate\Support\Facades\Log::info('Estado del cielo: ' . $datosGenerados[count($datosGenerados)-1]['estadoCielo']);

        return $this->store($datosGenerados);
    }
}
