@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Rol:</strong> {{ $user->rol }}</p>

    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar Usuario</a>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver al Listado</a>
</div>
@endsection
