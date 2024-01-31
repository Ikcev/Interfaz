<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
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

    public function insercionProvincias(){

        $provincias = [
            'Bilbao' => ['ZoneId' => 'great_bilbao', 'CodProv' => '48'],
            'Vitoria-Gasteiz' => ['ZoneId' => 'vitoria_gasteiz', 'CodProv' => '01'],
            'San Sebastián' => ['ZoneId' => 'donostialdea', 'CodProv' => '20'],
            'Zarautz' => ['ZoneId' => 'coastzone', 'CodProv' => '20'],
            'Eibar' => ['ZoneId' => 'cantabrian_valleys', 'CodProv' => '20'],
            'Durango' => ['ZoneId' => 'cantabrian_valleys', 'CodProv' => '48'],
            'Lekeitio' => ['ZoneId' => 'coastzone', 'CodProv' => '48'],
        ];
        
        foreach ($provincias as $name => $data) {
            Provincia::create([
                'codProv' => $data['CodProv'],
                'zoneId' => $data['ZoneId'],
            ]);
        }
        
            return 'Datos insertados correctamente en la base de datos.';

    }
}
