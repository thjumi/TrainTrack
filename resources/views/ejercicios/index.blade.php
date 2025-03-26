<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Ejercicios</title>
</head>
<body>
    <h1>Listado de Ejercicios</h1>
    <a href="{{ route('ejercicios.create') }}">Crear Nuevo Ejercicio</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Grupo Muscular</th>
                <th>Dificultad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ejercicios as $ejercicio)
                <tr>
                    <td>{{ $ejercicio->id }}</td>
                    <td>{{ $ejercicio->nombre }}</td>
                    <td>{{ $ejercicio->descripcion }}</td>
                    <td>{{ $ejercicio->grupoMuscular }}</td>
                    <td>{{ $ejercicio->dificultad }}</td>
                    <td>
                        <a href="{{ route('ejercicios.show', $ejercicio->id) }}">Ver</a>
                        <a href="{{ route('ejercicios.edit', $ejercicio->id) }}">Editar</a>
                        <form action="{{ route('ejercicios.destroy', $ejercicio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este ejercicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

