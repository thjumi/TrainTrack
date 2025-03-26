<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
</head>
<body>
    <h1>Listado de Reservas</h1>
    <a href="{{ route('reservas.create') }}">Crear Nueva Reserva</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Clase</th>
                <th>ID Usuario</th>
                <th>Creado en</th>
                <th>Actualizado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->clase_id }}</td>
                    <td>{{ $reserva->usuario_id }}</td>
                    <td>{{ $reserva->created_at }}</td>
                    <td>{{ $reserva->updated_at }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva->id) }}">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva->id) }}">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
