 <!-- The Modal -->
 <div class="modal" id="editDomicilioModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Editar domicilio</h4>
                 <button type="button" class="close" data-dismiss="modal">×</button>
             </div>

             <!-- Modal Body -->
             <div class="modal-body" id="modalContent">
                 <form method="POST" action="{{ route('personas.domicilios.update', [$persona, $domicilio]) }}"
                     id="editDomicilioForm">
                     @csrf
                     @method('PUT')
                     <div id="errorContainer"></div>
                     <input type="hidden" name="idPersona" id="editIdPersona">
                     <div class="form-group">
                         <label for="domicilio">Domicilio</label>
                         <input type="text" class="form-control" name="domicilio" id="editDomicilio" required>
                     </div>
                     <div class="form-group">
                         <label for="codigo_postal">Código Postal</label>
                         <input type="text" class="form-control" name="codigo_postal" id="editC-P" required>
                     </div>
                     <div class="form-group">
                         <label for="segundo_ap">Teléfono</label>
                         <input type="text" class="form-control" name="telefono" id="editTelefono" required>
                     </div>
                     <div class="form-group">
                         <label for="rfc">Correo electrónico</label>
                         <input type="email" class="form-control" name="email" id="editEmail" required>
                     </div>
                     <div class="form-group">
                         <label for="tipo_persona">Tipo</label>
                         <select class="form-control" name="tipo" id="editTipo" required>
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
             $('#editDomicilioModal').on('show.bs.modal', function(event) {
                 let button = $(event.relatedTarget); // Botón para ejecutar el modal
                 let domicilio = button.data('domicilio'); // Extraer información de la base de datos
                 let codigo_postal = button.data('codigo_postal');
                 let telefono = button.data('telefono');
                 let email = button.data('email');
                 let tipo = button.data('tipo');

                 // Recibir información
                 $('#editDomicilio').val(domicilio);
                 $('#editC-P').val(codigo_postal);
                 $('#editTelefono').val(telefono);
                 $('#editEmail').val(email);
                 $('#editTipo').val(tipo);


                 let domicilioId = button.data('domicilio-id'); // Obtener ID
                 let personaId = button.data('persona-id');
                 let form = $(this).find('#editDomicilioForm'); // Encontrar form modal
                 let url = '{{ route('personas.domicilios.update', [':persona', ':domicilio']) }}';
                 url = url.replace(':persona', personaId).replace(':domicilio', domicilioId);
                 form.attr('action', url); // Update form action
                 // Update form action
             });

             $('#editDomicilioForm').on('submit', function(event) {
                 event.preventDefault();
                 let form = $(this);
                 let url = form.attr('action');
                 $.ajax({
                     type: 'POST',
                     url: url,
                     data: form.serialize(),
                     success: function(data) {
                        location.reload(); // Recarga la página
                     },
                     error: function(xhr, status, error) {
                         let errorResponse = JSON.parse(xhr.responseText);
                         let errorContainer = $('#errorContainer');
                         errorContainer.empty();
                         $.each(errorResponse.errors, function(key, value) {
                             errorContainer.append('<p class="text-danger">' + value + '</p>');
                         });
                     }
                 });
             });
         </script>




     </div>
 </div>
