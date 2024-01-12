<!-- The Modal -->
<div class="modal" id="addPersonaModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nueva persona</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" id="modal-user">
                <form method="POST" id="form-user" action="{{ route('personas.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="primer_ap">Primer apellido</label>
                        <input type="text" id="primer_ap" class="form-control" name="primer_ap" required>
                    </div>
                    <div class="form-group">
                        <label for="segundo_ap">Segundo apellido</label>
                        <input type="text" id="segundo_ap" class="form-control" name="segundo_ap" required>
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" id="rfc" class="form-control" name="rfc" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" id="telefono" class="form-control" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_persona">Tipo de persona</label>
                        <select class="form-control" name="tipo_persona" required>
                            <option value="FISICA">Física</option>
                            <option value="MORAL">Moral</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus</label>
                        <select name="estatus" class="form-control" required>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>

        </div>

        <script>
            $(document).ready(function() {
                $('#form-user').on('submit', function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function(data) {
                            window.location.href = '/personas';
                        },
                        error: function(data) {
                            // Aquí puedes manejar los errores de validación
                            var errors = data.responseJSON.errors;

                            // Limpia los errores anteriores
                            $('.form-group').removeClass('has-error');
                            $('.help-block').remove();

                            // Muestra los nuevos errores
                            $.each(errors, function(key, value) {
                                $('#' + key).parent().addClass('has-error');
                                $('#' + key).parent().append('<span class="help-block">' +
                                    value + '</span>');
                            });
                        }
                    });
                });
            });
        </script>

    </div>
</div>
