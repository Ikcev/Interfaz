<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIElTiempoController extends Controller
{
    public function fetchDataFromApi($provinciaId, $municipioId)
    {
        try {
            $url = "https://www.el-tiempo.net/api/json/v2/provincias/{$provinciaId}/municipios/{$municipioId}";

            $response = Http::get($url);

            if ($response->successful()) {
                $data = json_decode($response->body(), true);

                if (is_array($data)) {
                    $todayData = $data['pronostico']['hoy'];

                    $vientoPorPeriodos = [];

                    foreach ($todayData['viento'] as $periodoInfo) {
                        $periodo = $periodoInfo['@attributes']['periodo'];
                        $vientoPorPeriodos[$periodo]['velocidad'] = $periodoInfo['velocidad'];
                        $vientoPorPeriodos[$periodo]['direccion'] = $periodoInfo['direccion'];
                    }

                    return view('api.index', [
                        'vientoPorPeriodos' => $vientoPorPeriodos,
                    ]);
                } else {
                    return view('error')->with('message', 'Error en la solicitud a la API');
                }
            } else {
                return view('error')->with('message', 'Error en la solicitud a la API');
            }
        } catch (\Exception $e) {
            return view('error')->with('message', 'Error en la solicitud a la API');
        }
    }

    public function show(string $municipio)
    {
        try {
            $municipioModel = Municipio::where('idMunicipio', $municipio)->with('provincia')->firstOrFail();
        
            \Illuminate\Support\Facades\Log::info('Provincia ID: ' . $municipioModel->idProvincia);
            \Illuminate\Support\Facades\Log::info('Municipio ID: ' . $municipio);
        
            $provinciaId = $municipioModel->idProvincia;
            $locId = $municipioModel->locId;
    
            \Illuminate\Support\Facades\Log::info('Provincia ID: ' . $provinciaId);
            \Illuminate\Support\Facades\Log::info('LocID(ELTIEMPO): ' . $locId);
    
            $codProv = $municipioModel->provincia->codProv; // Asumiendo que la relación se llama 'provincia'
        
            return $this->fetchDataFromApi($provinciaId, $locId, $codProv);
        } catch (ModelNotFoundException $e) {
            return view('error')->with('message', 'No se encontró el municipio con el ID proporcionado.');
        }
    }
    
    
}
