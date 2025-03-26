@extends('layouts.layout')
@section('title', 'Detalle de la Clase')
@section('content')
    <h1 class="text-3xl font-bold">{{ $clase->nombre }}</h1>
    <p class="mt-2">{{ $clase->descripcion }}</p>
    <p class="mt-2 font-semibold">Horario: {{ $clase->horario }}</p>
    <a href="{{ route('clases.index') }}" class="text-blue-500 mt-4 inline-block">Volver</a>
@endsection

-- resources/views/clases/create.blade.php --
@extends('layouts.layout')
@section('title', 'Crear Clase')
@section('content')
    <h1 class="text-3xl font-bold mb-4">Crear Nueva Clase</h1>
    <form method="POST" action="{{ route('clases.store') }}" class="space-y-4">
        @csrf
        <div>
            <label for="nombre" class="block font-semibold">Nombre:</label>
            <input type="text" name="nombre" class="border p-2 w-full rounded">
        </div>
        <div>
            <label for="horario" class="block font-semibold">Horario:</label>
            <input type="text" name="horario" class="border p-2 w-full rounded">
        </div>
        <button type="submit" class="bg-green-500 text-white p-2 rounded">Guardar</button>
    </form>
@endsection
