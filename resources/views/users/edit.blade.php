@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (dejar vacío para no cambiar)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
