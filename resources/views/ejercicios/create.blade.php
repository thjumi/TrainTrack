<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ejercicio</title>
</head>
<body>
    <h1>Crear Nuevo Ejercicio</h1>
    <form action="{{ route('ejercicios.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>
        
        <label for="grupoMuscular">Grupo Muscular:</label>
        <textarea id="grupoMuscular" name="grupoMuscular" required></textarea><br>
        
        <label for="dificultad">Dificultad:</label>
        <input type="number" id="dificultad" name="dificultad" required><br>

        <button type="submit">Guardar Ejercicio</button>
    </form>
</body>
</html>
