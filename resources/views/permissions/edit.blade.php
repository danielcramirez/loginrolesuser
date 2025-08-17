@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Editar Permiso</h2>
    <form method="POST" action="{{ route('permissions.update', $permission) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $permission->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
