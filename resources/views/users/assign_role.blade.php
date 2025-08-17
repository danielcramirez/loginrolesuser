@extends('layouts.panel')
@section('content')
<div class="container">
    <h2>Asignar Rol a {{ $user->name }} {{ $user->lastname }}</h2>
    <form method="POST" action="{{ route('users.assign_role.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="role_id" class="form-label">Rol</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <option value="">Seleccione un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Asignar Rol</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
