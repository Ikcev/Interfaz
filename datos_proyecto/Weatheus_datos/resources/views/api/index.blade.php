<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Viento por Periodos</title>
</head>
<body>
    <h1>Información del Viento por Periodos</h1>

    @if (!empty($vientoPorPeriodos))
        <table border="1">
            <thead>
                <tr>
                    <th>Periodo</th>
                    <th>Velocidad del Viento (m/s)</th>
                    <th>Dirección del Viento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vientoPorPeriodos as $periodo => $info)
                    <tr>
                        <td>{{ $periodo }}</td>
                        <td>{{ $info['velocidad'] }}</td>
                        <td>{{ $info['direccion'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay datos disponibles.</p>
    @endif
</body>
</html>
