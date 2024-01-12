@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
    <h3>Ingresa tus datos</h3>
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label for="User or Email">Correo o Usuario:</label><br>
        <input type="text" class="form-control" id="username" name="username"><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" class="form-control" id="password" name="password"><br>
        <input type="submit" class="btn btn-primary" value="Iniciar sesión">
    </form>

    <p class="mt-3">¿No tienes una cuenta? <a href="{{ route('registro.showRegistro') }}" class="btn btn-secondary">Regístrate</a></p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
@endsection
