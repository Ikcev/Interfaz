<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIElTiempoController extends Controller
{

    public function fetchDataFromApi()
    {
        try {
            $response = Http::get('https://www.el-tiempo.net/api/json/v2/provincias/01/municipios/01001');

            if ($response->successful()) {
                $data = json_decode($response->body());
                return view('api.index', ['data' => $data]);
            } else {
                return view('error')->with('message', 'Error en la solicitud a la API');
            }
        } catch (\Exception $e) {
            return view('error')->with('message', 'Error en la solicitud a la API');
        }
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
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
}
