@extends('layouts.panel')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">Registro de Usuario</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" class="form-control text-uppercase" id="name" name="name" value="{{ old('name') }}" required autofocus style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control text-uppercase" id="lastname" name="lastname" value="{{ old('lastname') }}" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
