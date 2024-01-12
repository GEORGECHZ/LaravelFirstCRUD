 <!-- The Modal -->
 <div class="modal" id="addDomicilioModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Agregar domicilio</h4>
                 <button type="button" class="close" data-dismiss="modal">×</button>
             </div>

             <!-- Modal Body -->
             <div class="modal-body" id="modalContent">
                 <form method="POST" id="form-address" action="{{ route('personas.domicilios.store', $persona) }}">
                     @csrf
                     <input type="hidden" name="idPersona" id="editIdPersona">
                     <div class="form-group">
                         <label for="domicilio">Domicilio</label>
                         <input type="text" class="form-control" id="domicilio" name="domicilio" required>
                     </div>
                     <div class="form-group">
                         <label for="codigo_postal">Código Postal</label>
                         <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                     </div>
                     <div class="form-group">
                         <label for="segundo_ap">Teléfono</label>
                         <input type="text" class="form-control" id="telefono" name="telefono"equired>
                     </div>
                     <div class="form-group">
                         <label for="rfc">Correo electrónico</label>
                         <input type="email" class="form-control" id="email" name="email" required>
                     </div>
                     <div class="form-group">
                         <label for="tipo_persona">Tipo</label>
                         <select class="form-control" name="tipo" required>
                             <option value="F">Fiscal</option>
                             <option value="P">Personal</option>
                         </select>
                     </div>
                     <button type="submit" class="btn btn-primary">Guardar</button>
                 </form>
             </div>

             <!-- Modal Footer -->
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
             </div>

         </div>

         <script>
             $('#form-address').on('submit', function(e) {
                 e.preventDefault(); // Evita que el formulario se envíe de la manera normal

                 $.ajax({
                     type: 'POST',
                     url: $(this).attr('action'),
                     data: $(this).serialize(),
                     success: function(data) {
                         // Cierra el modal y redirige o actualiza la vista como necesites
                         $('#addPersonaModal').modal('hide');
                         location.reload();
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
         </script>

     </div>
 </div>
