<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Ejercicio</title>
</head>
<body>
    <h1>Detalles del Ejercicio</h1>
    <p><strong>ID:</strong> {{ $ejercicio->id }}</p>
    <p><strong>Nombre:</strong> {{ $ejercicio->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $ejercicio->descripcion }}</p>
    <p><strong>Grupo Muscular:</strong> {{ $ejercicio->grupoMuscular }}</p>
    <p><strong>Dificultad:</strong> {{ $ejercicio->dificultad }}</p>

    <a href="{{ route('ejercicios.edit', $ejercicio->id) }}">Editar</a>
    <form action="{{ route('ejercicios.destroy', $ejercicio->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este ejercicio?')">Eliminar</button>
    </form>
    <br>
    <a href="{{ route('ejercicios.index') }}">Volver al Listado</a>
</body>
</html>

