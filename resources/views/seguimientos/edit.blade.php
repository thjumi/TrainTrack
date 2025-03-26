<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seguimiento</title>
</head>
<body>
    <h1>Editar Seguimiento</h1>
    <form action="{{ route('seguimientos.update', $seguimiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="rutina_id">ID Rutina:</label>
        <input type="text" id="rutina_id" name="rutina_id" value="{{ $seguimiento->rutina_id }}" required><br>
        
        <label for="peso">Peso:</label>
        <input type="number" step="0.01" id="peso" name="peso" value="{{ $seguimiento->peso }}" required><br>
        
        <label for="altura">Altura:</label>
        <input type="number" step="0.01" id="altura" name="altura" value="{{ $seguimiento->altura }}" required><br>
        
        <label for="fecha">Fecha:</label>
        <input type="datetime-local" id="fecha" name="fecha" value="{{ $seguimiento->fecha }}" required><br>
        
        <label for="observacion">Observación:</label>
        <textarea id="observacion" name="observacion">{{ $seguimiento->observacion }}</textarea><br>

        <button type="submit">Actualizar Seguimiento</button>
    </form>
</body>
</html>
