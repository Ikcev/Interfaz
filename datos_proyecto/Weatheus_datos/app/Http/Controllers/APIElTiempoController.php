<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\HistoricoElTiempo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIElTiempoController extends Controller
{
    public function fetchDataFromApi($provinciaId, $municipioId)
    {
        try {

            \Illuminate\Support\Facades\Log::info($provinciaId);
            \Illuminate\Support\Facades\Log::info($municipioId);
            $url = "https://www.el-tiempo.net/api/json/v2/provincias/{$provinciaId}/municipios/{$municipioId}";

            $response = Http::get($url);

            \Illuminate\Support\Facades\Log::info($response);
            if ($response->successful()) {
                $data = json_decode($response->body(), true);
    
                if (is_array($data)) {
                    $temperatura_actual = $data['temperatura_actual'];
                    $temperaturas_max = $data['temperaturas']['max'];
                    $temperaturas_min = $data['temperaturas']['min'];
    
                    $array_estado_cielo = $data['pronostico']['hoy']['estado_cielo'];
                    $array_precipitacion = $data['pronostico']['hoy']['precipitacion'];
                    $array_temperatura = $data['pronostico']['hoy']['temperatura'];
                    $array_sens_termica = $data['pronostico']['hoy']['sens_termica'];
                    $array_humedad_relativa = $data['pronostico']['hoy']['humedad_relativa'];
    
                    $array_direccion_viento = [];
                    $array_velocidad_viento = [];
    
                    foreach ($data['pronostico']['hoy']['viento'] as $periodoInfo) {
                        $array_direccion_viento[] = $periodoInfo['direccion'];
                        $array_velocidad_viento[] = $periodoInfo['velocidad'];
                    }

                    $temperatura = $array_sens_termica[14];

                    \Illuminate\Support\Facades\Log::info('Sensación Térmica : ' . $temperatura);
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
            $municipioModel = Municipio::with('provincia')->where('idMunicipio', $municipio)->firstOrFail();

            $codProv = $municipioModel->provincia->codProv;
            $locId = $municipioModel->locId;
    
            \Illuminate\Support\Facades\Log::info('MunicipioELTIEMPO: ' . $locId);
            \Illuminate\Support\Facades\Log::info('ProvinciaELTIEMPO: ' . $codProv);
            \Illuminate\Support\Facades\Log::info('////////////////////////////////');
    
            return $this->fetchDataFromApi($codProv, $locId);
        } catch (ModelNotFoundException $e) {
            return view('error')->with('message', 'No se encontró el municipio con el ID proporcionado.');
        }
    }
    
}
