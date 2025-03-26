<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Seguimientos</title>
</head>
<body>
    <h1>Listado de Seguimientos</h1>
    <a href="{{ route('seguimientos.create') }}">Crear Nuevo Seguimiento</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Usuario</th>
                <th>ID Rutina</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Fecha</th>
                <th>Observación</th>
                <th>Creado en</th>
                <th>Actualizado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seguimientos as $seguimiento)
                <tr>
                    <td>{{ $seguimiento->id }}</td>
                    <td>{{ $seguimiento->usuario_id }}</td>
                    <td>{{ $seguimiento->rutina_id }}</td>
                    <td>{{ $seguimiento->peso }}</td>
                    <td>{{ $seguimiento->altura }}</td>
                    <td>{{ $seguimiento->fecha }}</td>
                    <td>{{ $seguimiento->observacion }}</td>
                    <td>{{ $seguimiento->created_at }}</td>
                    <td>{{ $seguimiento->updated_at }}</td>
                    <td>
                        <a href="{{ route('seguimientos.show', $seguimiento->id) }}">Ver</a>
                        <a href="{{ route('seguimientos.edit', $seguimiento->id) }}">Editar</a>
                        <form action="{{ route('seguimientos.destroy', $seguimiento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este seguimiento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
