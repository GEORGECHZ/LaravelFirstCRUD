@extends('layouts.plantilla')

@section('title', 'personas')

@section('content')

    <div class="container">


        <div class="mb-2">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPersonaModal">
                Agregar nueva persona +
            </button>

            @include('personas.create')

            <div class="float-right">
                <form method="GET" action="{{ route('personas.index') }}"> Registros
                    <select name="paginate" onchange="this.form.submit()">
                        <option value="5" {{ Request::get('paginate') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ Request::get('paginate') == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ Request::get('paginate') == 15 ? 'selected' : '' }}>15</option>
                        <option value="25" {{ Request::get('paginate') == 25 ? 'selected' : '' }}>25</option>
                        <!-- Add more options as needed -->
                    </select>
                </form>
            </div>
        </div>


        <!-- Search form -->

        <input type="text" class="form-control" id="search" name="search" placeholder="Buscar personas">



        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <td>{{ implode(' ', [$persona->nombre, $persona->primer_ap, $persona->segundo_ap]) }}</td>
                        <td>{{ $persona->rfc }}</td>
                        <td>{{ $persona->telefono }}</td>
                        <td>{{ $persona->tipo_persona }}</td>
                        <td>


                            <!-- Button Active and Inactive -->
                            @if ($persona->estatus == 2)
                                <form method="POST" action="{{ route('personas.activated', $persona) }}" 
                                    style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="estatus" value="1">
                                    <button type="submit" class="btn btn-secondary"
                                        onclick="return confirm('¿Estás seguro de que quieres ACTIVAR a {{ $persona->nombre }}?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('personas.activated', $persona) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="estatus" value="2">
                                    <button type="submit" class="btn btn-success"
                                        onclick="return confirm('¿Estás seguro de que quieres DESACTIVAR a {{ $persona->nombre }}?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            @endif


                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editPersonaModal"
                                data-persona-id="{{ $persona->id }}" data-nombre="{{ $persona->nombre }}"
                                data-primer_ap="{{ $persona->primer_ap }}" data-segundo_ap="{{ $persona->segundo_ap }}"
                                data-rfc="{{ $persona->rfc }}" data-telefono="{{ $persona->telefono }}"
                                data-tipo_persona="{{ $persona->tipo_persona }}"
                                data-estatus="{{ $persona->estatus }}">Editar</a>


                            @include('personas.edit')



                            <a href="{{ route('personas.domicilios.index', $persona) }}"
                                class="btn btn-info">Direcciones</a>

                            <!-- Delete Button -->
                            <form style="display: inline;" method="POST"
                                action="{{ route('personas.destroy', $persona) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres ELIMINAR a {{ $persona->nombre }}?')">
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

        {{ $personas->appends(['paginate' => Request::get('paginate')])->links('pagination::bootstrap-4') }}
    </div>

    <script>
        // Script JavaScript
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                if (query.trim() !== '') {
                    $.ajax({
                        url: "{{ route('personas.search') }}",
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            updateSearchResults(data.html);
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                } else {
                    // Recargar la página actual
                    window.location.reload();

                }
            });


            function updateSearchResults(html) {
                var resultsContainer = $('#table1 tbody');
                resultsContainer.empty();

                if (html.trim() !== '') {
                    resultsContainer.append(html);
                } else {
                    resultsContainer.append('<tr><td colspan="5">No results found.</td></tr>');
                }
            }
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection
