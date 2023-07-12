<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD de Eventos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-danger sticky-top" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">
    <img src="https://capac.org.mx/assets/img/logo_capac.png" alt="Capac" width="%50" height="auto">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="d-fleX">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="eventos.php">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="noticias.php">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
    </div>
  </div>
</nav>


  <div class="container">
  <h2 class="my-4">Noticias</h2>
 <!-- <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Agregar Evento</button>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Fecha del Evento</th>
        <th>Lugar</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="eventosTableBody">
     Filas de eventos generadas por JavaScript 
    </tbody>
  </table>
</div> -->

<!-- Modal de Crear Evento -->
<!-- <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Agregar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="createForm">
          <div class="mb-3">
            <label for="createTitulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="createTitulo" required>
          </div>
          <div class="mb-3">
            <label for="createFecha" class="form-label">Fecha del Evento:</label>
            <input type="date" class="form-control" id="createFecha" required>
          </div>
          <div class="mb-3">
            <label for="createLugar" class="form-label">Lugar:</label>
            <input type="text" class="form-control" id="createLugar" required>
          </div>
          <div class="mb-3">
            <label for="createDescripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="createDescripcion" rows="5" required></textarea>
          </div>
          <div class="mb-3">
            <label for="createImagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" id="createImagen" accept="image/*" required>
          </div>
          <button type="submit" class="btn btn-primary">Crear Evento</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<!-- Modal de Editar Evento -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <input type="hidden" id="editId">
          <div class="mb-3">
            <label for="editTitulo" class="form-label">Título:</label>
            <input type="text" class="form-control" id="editTitulo" required>
          </div>
          <div class="mb-3">
            <label for="editFecha" class="form-label">Fecha del Evento:</label>
            <input type="date" class="form-control" id="editFecha" required>
          </div>
          <div class="mb-3">
            <label for="editLugar" class="form-label">Lugar:</label>
            <input type="text" class="form-control" id="editLugar" required>
          </div>
          <div class="mb-3">
            <label for="editDescripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="editDescripcion" rows="5" required></textarea>
          </div>
          <div class="mb-3">
            <label for="editImagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" id="editImagen" accept="image/*">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Evento</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<!-- Modal de Eliminar Evento -->
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Eliminar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de que deseas eliminar este evento?</p>
      </div>
     ```html
      <div class="modal-footer">
        <form id="deleteForm">
          <input type="hidden" id="deleteId">
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div> -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../admin/evento/js/script.js"></script>
</body>
</html>
