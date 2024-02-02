<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
/*    
    public function insercionRegistroElTiempo(){

        foreach ($data['pronostico']['hoy']['estado_cielo'] as $key => $estadoCielo) {
            $historico = new HistoricoElTiempo();

            $horaActualRedondeada = $now->minute(0)->second(0);
            
            $historico->estadoCielo = $estadoCielo;
            $historico->precipitacion = $data['pronostico']['hoy']['precipitacion'][$key];
            $historico->temp = $data['pronostico']['hoy']['temperatura'][$key];
            $historico->tempMax = $data['pronostico']['hoy']['temperatura']['max'];
            $historico->tempMin = $data['pronostico']['hoy']['temperatura']['min'];
            $historico->humedad = $data['pronostico']['hoy']['humedad_relativa'][$key];
            $historico->sensTermica = $data['pronostico']['hoy']['sens_termica'][$key];
            $historico->dirViento = $data['pronostico']['hoy']['viento'][$key]['direccion'];
            $historico->velViento = $data['pronostico']['hoy']['viento'][$key]['velocidad'];
            $historico->idMunicipio = $idMunicipio;
            $historico->created_at = $horaActualRedondeada;
            $historico->save();
        }
    }
    */
}
