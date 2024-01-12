@extends('layouts.plantilla')

@section('title', 'Domicilios')

@section('content')
    <div class="container">
        <h1>Domicilios de {{ $persona->nombre }}</h1>

        <button class="btn btn-primary" onclick="goBack()">Volver</button>

        <div class="float-right">
            <div class="mb-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDomicilioModal">
                    Agregar domicilio +
                </button>
            </div>
            @include('personas.domicilios.create')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Domicilio</th>
                    <th>Codigo Postal</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($persona->domicilios as $domicilio)
                    <tr>
                        <td>{{ $domicilio->domicilio }}</td>
                        <td>{{ $domicilio->codigo_postal }}</td>
                        <td>{{ $domicilio->telefono }}</td>
                        <td>{{ $domicilio->email }}</td>
                        <td>{{ $domicilio->tipo == 'P' ? 'Personal' : 'Fiscal' }}</td>

                        <td>

                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#editDomicilioModal"
                                data-domicilio-id="{{ $domicilio->id }}" data-domicilio="{{ $domicilio->domicilio }}"
                                data-persona-id="{{ $domicilio->persona_id }}"
                                data-codigo_postal="{{ $domicilio->codigo_postal }}" data-email="{{ $domicilio->email }}"
                                data-telefono="{{ $domicilio->telefono }}" data-tipo="{{ $domicilio->tipo }}">Editar</a>

                            @include('personas.domicilios.edit')


                            <!-- Delete Button -->
                            <form style="display: inline;" method="POST"
                                action="{{ route('personas.domicilios.destroy', [$persona, $domicilio]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar el domicilio?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z">
                                        </path>
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z">
                                        </path>
                                    </svg>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>


@endsection
