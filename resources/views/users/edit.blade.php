@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        
        <!-- Opcional: permitir actualizar contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (déjala en blanco para mantener la actual)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-control" id="rol" name="rol" required>
                <option value="administrador" {{ $user->rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="entrenador" {{ $user->rol == 'entrenador' ? 'selected' : '' }}>Entrenador</option>
                <option value="user" {{ $user->rol == 'user' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>
@endsection
