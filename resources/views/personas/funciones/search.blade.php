<!-- Button Active and Inactive -->
@if ($persona->estatus == 2)
    <form method="POST" action="{{ route('personas.activated', $persona) }}" style="display: inline;">
        @csrf
        @method('PUT')
        <input type="hidden" name="estatus" value="1">
        <button type="submit" class="btn btn-secondary"
            onclick="return confirm('¿Estás seguro de que quieres ACTIVAR a {{ $persona->nombre }}?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                <path
                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zM6 7.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1">
                </path>
            </svg>
        </button>
    </form>
@else
    <form action="{{ route('personas.activated', $persona) }}" method="POST" style="display: inline;">
        @csrf
        @method('PUT')
        <input type="hidden" name="estatus" value="2">
        <button type="submit" class="btn btn-success"
            onclick="return confirm('¿Estás seguro de que quieres DESACTIVAR a {{ $persona->nombre }}?')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-patch-check-fill" viewBox="0 0 16 16">
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
    data-tipo_persona="{{ $persona->tipo_persona }}" data-estatus="{{ $persona->estatus }}">Editar</a>

@include('personas.edit')


<a href="{{ route('personas.domicilios.index', $persona->id) }}" class="btn btn-info">Direcciones</a>



<form style="display: inline;" method="POST" action="{{ route('personas.destroy', $persona->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
            viewBox="0 0 16 16">
            <path
                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z">
            </path>
            <path
                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z">
            </path>
        </svg>
    </button>
</form>
