<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layouts.app')

@section('content')
    <h1>Información de la API</h1>

    @if(isset($data))
        <ul>
            @foreach($data as $item)
                <li>{{ $item->property }}</li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron datos de la API</p>
    @endif
@endsection

    
</body>
</html>