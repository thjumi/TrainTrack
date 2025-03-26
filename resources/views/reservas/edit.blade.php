<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reserva</title>
</head>
<body>
    <h1>Editar Reserva</h1>
    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="clase_id">ID Clase:</label>
        <input type="text" id="clase_id" name="clase_id" value="{{ $reserva->clase_id }}" required><br>
        
        <label for="usuario_id">ID Usuario:</label>
        <input type="text" id="usuario_id" name="usuario_id" value="{{ $reserva->usuario_id }}" required><br>

        <button type="submit">Actualizar Reserva</button>
    </form>
</body>
</html>
