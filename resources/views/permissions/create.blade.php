@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Nuevo Permiso</h2>
    <form method="POST" action="{{ route('permissions.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
