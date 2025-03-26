<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reserva</title>
</head>
<body>
    <h1>Crear Nueva Reserva</h1>
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <label for="clase_id">ID Clase:</label>
        <input type="text" id="clase_id" name="clase_id" required><br>
        
        <label for="usuario_id">ID Usuario:</label>
        <input type="text" id="usuario_id" name="usuario_id" required><br>

        <button type="submit">Guardar Reserva</button>
    </form>
</body>
</html>
