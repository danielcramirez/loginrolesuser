@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Nuevo Usuario</h2>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
