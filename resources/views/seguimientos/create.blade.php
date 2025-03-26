<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Seguimiento</title>
</head>
<body>
    <h1>Crear Nuevo Seguimiento</h1>
    <form action="{{ route('seguimientos.store') }}" method="POST">
        @csrf
        <label for="rutina_id">ID Rutina:</label>
        <input type="text" id="rutina_id" name="rutina_id" required><br>
        
        <label for="peso">Peso:</label>
        <input type="number" step="0.01" id="peso" name="peso" required><br>
        
        <label for="altura">Altura:</label>
        <input type="number" step="0.01" id="altura" name="altura" required><br>
        
        <label for="fecha">Fecha:</label>
        <input type="datetime-local" id="fecha" name="fecha" required><br>
        
        <label for="observacion">Observación:</label>
        <textarea id="observacion" name="observacion"></textarea><br>

        <button type="submit">Guardar Seguimiento</button>
    </form>
</body>
</html>
