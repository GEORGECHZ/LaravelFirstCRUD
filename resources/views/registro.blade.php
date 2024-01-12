@extends('layouts.plantilla')

@section('title', 'Registro')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('registro.store')}}">
                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Usuario</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" required
                                        autocomplete="username" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="names" class="col-md-4 col-form-label text-md-right">Nombres</label>

                                <div class="col-md-6">
                                    <input id="names" type="text" class="form-control" name="name" required
                                        autocomplete="names">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastnames" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                                <div class="col-md-6">
                                    <input id="lastnames" type="text" class="form-control" name="last_name" required
                                        autocomplete="lastnames">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cellphone" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                <div class="col-md-6">
                                    <input id="cellphone" type="text" class="form-control" name="phone" required
                                        autocomplete="cellphone">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
