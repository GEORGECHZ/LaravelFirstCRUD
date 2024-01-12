 <!-- The Modal -->
 <div class="modal" id="editPersonaModal">
     <div class="modal-dialog">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Editar persona</h4>
                 <button type="button" class="close" data-dismiss="modal">×</button>
             </div>

             <!-- Modal Body -->
             <div class="modal-body" id="modalContent">
                 <form method="POST" action="" id="editPersonaForm">
                     @csrf
                     @method('PUT')
                     <div id="errorContainer"></div>
                     <div class="form-group">
                         <label for="nombre">Nombre</label>
                         <input type="text" class="form-control" name="nombre" id="editNombre" required>
                     </div>
                     <div class="form-group">
                         <label for="primer_ap">Primer apellido</label>
                         <input type="text" class="form-control" name="primer_ap" id="editPrimerAp" required>
                     </div>
                     <div class="form-group">
                         <label for="segundo_ap">Segundo apellido</label>
                         <input type="text" class="form-control" id="editSegundoAp" name="segundo_ap" required>
                     </div>
                     <div class="form-group">
                         <label for="rfc">RFC</label>
                         <input type="text" class="form-control" id="editRfc" name="rfc" required>
                     </div>
                     <div class="form-group">
                         <label for="telefono">Teléfono</label>
                         <input type="text" class="form-control" id="editTelefono" name="telefono" required>
                     </div>
                     <div class="form-group">
                         <label for="tipo_persona">Tipo de persona</label>
                         <select class="form-control" id="editTipoPersona" name="tipo_persona" required>
                             <option value="FISICA">Física</option>
                             <option value="MORAL">Moral</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="estatus">Estatus</label>
                         <select id="editEstatus" name="estatus" class="form-control" required>
                             <option value="1">Activo</option>
                             <option value="2">Inactivo</option>
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
             $(document).on('show.bs.modal', '#editPersonaModal', function(event) {
                 let button = $(event.relatedTarget); // Botón para ejecutar el modal
                 console.log(button.data());
                 let nombre = button.data('nombre'); // Extraer información de la base de datos
                 let primer_ap = button.data('primer_ap');
                 let segundo_ap = button.data('segundo_ap');
                 let rfc = button.data('rfc');
                 let telefono = button.data('telefono');
                 let tipo_persona = button.data('tipo_persona');
                 let estatus = button.data('estatus');

                 // Recibir información
                 $('#editNombre').val(nombre);
                 $('#editPrimerAp').val(primer_ap);
                 $('#editSegundoAp').val(segundo_ap);
                 $('#editRfc').val(rfc);
                 $('#editTelefono').val(telefono);
                 $('#editTipoPersona').val(tipo_persona);
                 $('#editEstatus').val(estatus);


                 let personaId = button.data('persona-id'); // Obtener ID
                 let form = $(this).find('#editPersonaForm'); // Encontrar form modal
                 form.attr('action', '{{ route('personas.update', ':persona_id') }}'.replace(':persona_id',
                     personaId)); // Update form action

             });


             $('#editPersonaForm').on('submit', function(event) {
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
