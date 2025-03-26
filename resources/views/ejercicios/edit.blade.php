<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ejercicio</title>
</head>
<body>
    <h1>Editar Ejercicio</h1>
    <form action="{{ route('ejercicios.update', $ejercicio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $ejercicio->nombre }}" required><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required>{{ $ejercicio->descripcion }}</textarea><br>
        
        <label for="grupoMuscular">Grupo Muscular:</label>
        <textarea id="grupoMuscular" name="grupoMuscular" required>{{ $ejercicio->grupoMuscular }}</textarea><br>
        
        <label for="dificultad">Dificultad:</label>
        <input type="number" id="dificultad" name="dificultad" value="{{ $ejercicio->dificultad }}" required><br>

        <button type="submit">Actualizar Ejercicio</button>
    </form>
</body>
</html>
