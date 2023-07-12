$(document).ready(function() {
  // Cargar eventos al cargar la página
  loadEventos();

  // Mostrar modal de crear evento
  $('#createModal').on('shown.bs.modal', function() {
    $('#createForm').trigger('reset');
  });

  // Mostrar modal de editar evento
  $('#editModal').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var titulo = button.data('titulo');
    var fecha = button.data('fecha');
    var lugar = button.data('lugar');
    var descripcion = button.data('descripcion');

    $('#editId').val(id);
    $('#editTitulo').val(titulo);
    $('#editFecha').val(fecha);
    $('#editLugar').val(lugar);
    $('#editDescripcion').val(descripcion);
  });

  // Mostrar modal de eliminar evento
  $('#deleteModal').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');

    $('#deleteId').val(id);
  });

  // Enviar solicitud para crear evento
  $('#createForm').submit(function(event) {
    event.preventDefault();

    var titulo = $('#createTitulo').val();
    var fecha = $('#createFecha').val();
    var lugar = $('#createLugar').val();
    var descripcion = $('#createDescripcion').val();
    var imagen = $('#createImagen')[0].files[0];

    var formData = new FormData();
    formData.append('titulo', titulo);
    formData.append('fecha', fecha);
    formData.append('lugar', lugar);
    formData.append('descripcion', descripcion);
    formData.append('imagen', imagen);

    $.ajax({
      url: '../admin/evento/create.php',
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#createModal').modal('hide');
        loadEventos();
      },
      error: function() {
        alert('Ocurrió un error al crear el evento. Por favor, intenta nuevamente.');
      }
    });
  });

  // Enviar solicitud para actualizar evento
  $('#editForm').submit(function(event) {
    event.preventDefault();

    var id = $('#editId').val();
    var titulo = $('#editTitulo').val();
    var fecha = $('#editFecha').val();
    var lugar = $('#editLugar').val();
    var descripcion = $('#editDescripcion').val();
    var imagen = $('#editImagen')[0].files[0];

    var formData = new FormData();
    formData.append('id', id);
    formData.append('titulo', titulo);
    formData.append('fecha', fecha);
    formData.append('lugar', lugar);
    formData.append('descripcion', descripcion);
    formData.append('imagen', imagen);

    $.ajax({
      url: '../admin/evento/update.php',
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        $('#editModal').modal('hide');
        loadEventos();
      },
      error: function() {
        alert('Ocurrió un error al actualizar el evento. Por favor, intenta nuevamente.');
      }
    });
  });

  // Enviar solicitud para eliminar evento
  $('#deleteForm').submit(function(event) {
    event.preventDefault();

    var id = $('#deleteId').val();

    $.ajax({
      url: '../admin/evento/delete.php',
      method: 'POST',
      data: { id: id },
      success: function(response) {
        $('#deleteModal').modal('hide');
        loadEventos();
      },
      error: function() {
        alert('Ocurrió un error al eliminar el evento. Por favor, intenta nuevamente.');
      }
    });
  });

  // Cargar eventos desde la API
  function loadEventos() {
    $.ajax({
      url: '../admin/evento/api.php',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        var eventos = response.eventos;
        var tableBody = $('#eventosTableBody');
        tableBody.empty();

        eventos.forEach(function(evento) {
          var row = `
            <tr>
                <td>${evento.id}</td>
                <td>${evento.titulo}</td>
                <td>${evento.fecha_evento}</td>
                <td>${evento.lugar}</td>
                <td>${evento.descripcion}</td>
                <td>
                  <img src="carpeta_imagenes/${evento.imagen}" alt="Imagen del Evento" class="img-thumbnail">
                </td>
                <td>
                  <div class="d-grid gap-2">

                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal"
                          data-id="${evento.id}" data-titulo="${evento.titulo}" data-fecha="${evento.fecha_evento}"
                          data-lugar="${evento.lugar}" data-descripcion="${evento.descripcion}">
                          Editar
                        </button>

                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                          data-id="${evento.id}">
                          Eliminar
                        </button>
                  </div>
                </td>
            </tr>
          `;
          tableBody.append(row);
        });
      },
      error: function() {
        alert('Ocurrió un error al cargar los eventos. Por favor, intenta nuevamente.');
      }
    });
  }
});
