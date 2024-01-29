<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>El tiempo en Alegría-Dulantzi</h1>

    <div>
        <h2>Información general</h2>
        <p>Fecha: {{ $data['fecha'] }}</p>
        <p>Temperatura actual: {{ $data['temperatura_actual'] }}°C</p>
        <p>Estado del cielo: {{ $data['stateSky']['description'] }}</p>
        <p>Humedad: {{ $data['humedad'] }}%</p>
        <p>Viento: {{ $data['viento'] }} km/h</p>
        <p>Precipitación: {{ $data['precipitacion'] }} mm</p>
    </div>

    <div>
        <h2>Pronóstico para hoy</h2>
        <ul>
            @foreach($data['pronostico']['hoy']['temperatura'] as $index => $temperatura)
                <li>
                    Hora: {{ $index }}:00 - Temperatura: {{ $temperatura }}°C
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2>Pronóstico para mañana</h2>
        <ul>
            @foreach($data['pronostico']['manana']['temperatura'] as $index => $temperatura)
                <li>
                    Hora: {{ $index }}:00 - Temperatura: {{ $temperatura }}°C
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2>Próximos días</h2>
        <ul>
            @foreach($data['proximos_dias'] as $dia)
                <li>
                    Fecha: {{ $dia['@attributes']['fecha'] }} - Máxima: {{ $dia['temperatura']['maxima'] }}°C, Mínima: {{ $dia['temperatura']['minima'] }}°C
                </li>
            @endforeach
        </ul>
    </div>


    
</body>
</html>