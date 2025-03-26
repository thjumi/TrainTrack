@extends('layouts.layout')
@section('title', 'Clases')
@section('content')
    <h1 class="text-3xl font-bold mb-4">Clases Disponibles</h1>
    <a href="{{ route('clases.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Crear Nueva Clase</a>
    <table class="w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 p-2">Nombre</th>
                <th class="border border-gray-300 p-2">Horario</th>
                <th class="border border-gray-300 p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clases as $clase)
                <tr class="text-center">
                    <td class="border border-gray-300 p-2">{{ $clase->nombre }}</td>
                    <td class="border border-gray-300 p-2">{{ $clase->horario }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('clases.show', $clase->id) }}" class="text-blue-500">Ver</a>
                        <a href="{{ route('clases.edit', $clase->id) }}" class="text-yellow-500">Editar</a>
                        <form action="{{ route('clases.destroy', $clase->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
