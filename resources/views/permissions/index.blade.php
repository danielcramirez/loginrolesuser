@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Permisos</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Nuevo Permiso</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->description }}</td>
                <td>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este permiso?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
