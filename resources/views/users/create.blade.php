@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Usuario</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-control" id="rol" name="rol" required>
                <option value="administrador">Administrador</option>
                <option value="entrenador">Entrenador</option>
                <option value="user">Usuario</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection
