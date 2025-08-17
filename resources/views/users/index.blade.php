@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Usuarios</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                    <a href="{{ route('users.assign_role.edit', $user->id) }}" class="btn btn-sm btn-info">Asignar Rol</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
