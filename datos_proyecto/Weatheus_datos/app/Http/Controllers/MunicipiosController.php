<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
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

    public function insercionMunicipios(){

        $municipios = [
            'Bilbao' => ['IdMunicipio' => 'bilbao', 'locId' => '48020', 'idProvincia' => 1],
            'Vitoria-Gasteiz' => ['IdMunicipio' => 'vitoria_gasteiz', 'locId' => '01059', 'idProvincia' => 2],
            'San Sebastián' => ['IdMunicipio' => 'donostia', 'locId' => '20069', 'idProvincia' => 3],
            'Hondarribia' => ['IdMunicipio' => 'hondarribia', 'locId' => '20036', 'idProvincia' => 4],
            'Zarautz' => ['IdMunicipio' => 'zarautz', 'locId' => '20079', 'idProvincia' => 4],
            'Eibar' => ['IdMunicipio' => 'eibar', 'locId' => '20030', 'idProvincia' => 5],
            'Getxo' => ['IdMunicipio' => 'getxo', 'locId' => '48044', 'idProvincia' => 1],
            'Durango' => ['IdMunicipio' => 'durango', 'locId' => '48027', 'idProvincia' => 6],
            'Azpeitia' => ['IdMunicipio' => 'azpeitia', 'locId' => '20018', 'idProvincia' => 5],
            'Lekeitio' => ['IdMunicipio' => 'lekeitio', 'locId' => '48057', 'idProvincia' => 7],
        ];
        
        foreach ($municipios as $name => $data) {
            Municipio::create([
                'idMunicipio' => $data['IdMunicipio'],
                'locId' => $data['locId'],
                'idProvincia' => $data['idProvincia']
            ]);
        }
        
            return 'Datos insertados correctamente en la base de datos.';

    }
}
