@extends('layouts.layout')
@section('title', 'Editar Clase')
@section('content')
    <h1 class="text-3xl font-bold mb-4">Editar Clase</h1>
    <form method="POST" action="{{ route('clases.update', $clase->id) }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre" class="block font-semibold">Nombre:</label>
            <input type="text" name="nombre" value="{{ $clase->nombre }}" class="border p-2 w-full rounded">
        </div>
        <div>
            <label for="horario" class="block font-semibold">Horario:</label>
            <input type="text" name="horario" value="{{ $clase->horario }}" class="border p-2 w-full rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Actualizar</button>
    </form>
@endsection
