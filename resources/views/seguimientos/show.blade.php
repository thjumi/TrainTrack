<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Seguimiento</title>
</head>
<body>
    <h1>Detalles del Seguimiento</h1>
    <p><strong>ID:</strong> {{ $seguimiento->id }}</p>
    <p><strong>ID Usuario:</strong> {{ $seguimiento->usuario_id }}</p>
    <p><strong>ID Rutina:</strong> {{ $seguimiento->rutina_id }}</p>
    <p><strong>Peso:</strong> {{ $seguimiento->peso }}</p>
    <p><strong>Altura:</strong> {{ $seguimiento->altura }}</p>
    <p><strong>Fecha:</strong> {{ $seguimiento->fecha }}</p>
    <p><strong>Observación:</strong> {{ $seguimiento->observacion }}</p>
    <p><strong>Creado en:</strong> {{ $seguimiento->created_at }}</p>
    <p><strong>Actualizado en:</strong> {{ $seguimiento->updated_at }}</p>

    <a href="{{ route('seguimientos.edit', $seguimiento->id) }}">Editar</a>
    <form action="{{ route('seguimientos.destroy', $seguimiento->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este seguimiento?')">Eliminar</button>
    </form>
    <br>
    <a href="{{ route('seguimientos.index') }}">Volver al Listado</a>
</body>
</html>
