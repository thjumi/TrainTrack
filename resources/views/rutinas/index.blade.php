<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Rutinas</title>
</head>
<body>
    <h1>Listado de Rutinas</h1>
    <a href="{{ route('rutinas.create') }}">Crear Nueva Rutina</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Creado en</th>
                <th>Actualizado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rutinas as $rutina)
                <tr>
                    <td>{{ $rutina->id }}</td>
                    <td>{{ $rutina->nombre }}</td>
                    <td>{{ $rutina->descripcion }}</td>
                    <td>{{ $rutina->created_at }}</td>
                    <td>{{ $rutina->updated_at }}</td>
                    <td>
                        <a href="{{ route('rutinas.show', $rutina->id) }}">Ver</a>
                        <a href="{{ route('rutinas.edit', $rutina->id) }}">Editar</a>
                        <form action="{{ route('rutinas.destroy', $rutina->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta rutina?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
