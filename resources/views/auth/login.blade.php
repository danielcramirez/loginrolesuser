@extends('layouts.panel')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-xs mx-auto">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">Iniciar Sesión</div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="login" class="form-label">Usuario o Email</label>
                        <input type="text" class="form-control" id="login" name="login" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ route('register.form') }}">¿Nuevo usuario?</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
