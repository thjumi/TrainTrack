<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rutina</title>
</head>
<body>
    <h1>Editar Rutina</h1>
    <form action="{{ route('rutinas.update', $rutina->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $rutina->nombre }}" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required>{{ $rutina->descripcion }}</textarea><br>

        <button type="submit">Actualizar Rutina</button>
    </form>
</body>
</html>
