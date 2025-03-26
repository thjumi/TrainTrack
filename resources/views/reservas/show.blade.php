<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Reserva</title>
</head>
<body>
    <h1>Detalles de la Reserva</h1>
    <p><strong>ID:</strong> {{ $reserva->id }}</p>
    <p><strong>ID Clase:</strong> {{ $reserva->clase_id }}</p>
    <p><strong>ID Usuario:</strong> {{ $reserva->usuario_id }}</p>
    <p><strong>Creado en:</strong> {{ $reserva->created_at }}</p>
    <p><strong>Actualizado en:</strong> {{ $reserva->updated_at }}</p>

    <a href="{{ route('reservas.edit', $reserva->id) }}">Editar</a>
    <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">Eliminar</button>
    </form>
    <br>
    <a href="{{ route('reservas.index') }}">Volver al Listado</a>
</body>
</html>
