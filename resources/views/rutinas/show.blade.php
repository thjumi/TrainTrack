<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Rutina</title>
</head>
<body>
    <h1>Detalles de la Rutina</h1>
    <p><strong>ID:</strong> {{ $rutina->id }}</p>
    <p><strong>Nombre:</strong> {{ $rutina->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $rutina->descripcion }}</p>
    <p><strong>Creado en:</strong> {{ $rutina->created_at }}</p>
    <p><strong>Actualizado en:</strong> {{ $rutina->updated_at }}</p>

    <a href="{{ route('rutinas.edit', $rutina->id) }}">Editar</a>
    <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta rutina?')">Eliminar</button>
    </form>
    <br>
    <a href="{{ route('rutinas.index') }}">Volver al Listado</a>
</body>
</html>
