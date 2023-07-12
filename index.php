<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <!-- Slider principal -->
  <div id="slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      // Conexión a la base de datos
      $conn = new mysqli('localhost', 'root', '', 'landing_page');
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Obtener imágenes del slider desde la base de datos
      $slider_query = "SELECT * FROM slider";
      $slider_result = $conn->query($slider_query);

      if ($slider_result->num_rows > 0) {
        $active = true;
        while ($row = $slider_result->fetch_assoc()) {
          $imagen = $row['imagen'];
          $titulo = $row['titulo'];
          $descripcion = $row['descripcion'];

          // Mostrar imagen en el slider
          echo '
          <div class="carousel-item ' . ($active ? 'active' : '') . '">
            <img src="' . $imagen . '" class="d-block w-100" alt="' . $titulo . '">
            <div class="carousel-caption d-none d-md-block">
              <h5>' . $titulo . '</h5>
              <p>' . $descripcion . '</p>
            </div>
          </div>
          ';

          $active = false;
        }
      }

      // Cerrar conexión a la base de datos
      $conn->close();
      ?>
    </div>
    <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </a>
  </div>

  <!-- Sección de noticias -->
  <section id="noticias" class="py-5">
    <div class="container">
      <h2>Noticias</h2>
      <div class="row">
        <?php
        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'landing_page');
        if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener noticias desde la base de datos
        $noticias_query = "SELECT * FROM noticias ORDER BY fecha_publicacion DESC LIMIT 3";
        $noticias_result = $conn->query($noticias_query);

        if ($noticias_result->num_rows > 0) {
          while ($row = $noticias_result->fetch_assoc()) {
            $titulo = $row['titulo'];
            $contenido = $row['contenido'];
            $fecha_publicacion = $row['fecha_publicacion'];

            // Mostrar noticia
            echo '
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">' . $titulo . '</h5>
                  <p class="card-text">' . $contenido . '</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Publicado el ' . $fecha_publicacion . '</small>
                </div>
              </div>
            </div>
            ';
          }
        } else {
          echo '<div class="col"><p>No se encontraron noticias.</p></div>';
        }

        // Cerrar conexión a la base de datos
        $conn->close();
        ?>
      </div>
    </div>
  </section>

  <!-- Sección de eventos -->
  <section id="eventos" class="py-5">
    <div class="container">
      <h2>Eventos</h2>
      <div class="row">
        <?php
        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'landing_page');
        if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener eventos desde la base de datos
        $eventos_query = "SELECT * FROM eventos ORDER BY fecha_evento ASC LIMIT 3";
        $eventos_result = $conn->query($eventos_query);

        if ($eventos_result->num_rows > 0) {
          while ($row = $eventos_result->fetch_assoc()) {
            $titulo = $row['titulo'];
            $fecha_evento = $row['fecha_evento'];
            $lugar = $row['lugar'];
            $descripcion = $row['descripcion'];

            // Mostrar evento
            echo '
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h5 class="card-title">' . $titulo . '</h5>
                  <p class="card-text">' . $descripcion . '</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">' . $fecha_evento . ' | ' . $lugar . '</small>
                </div>
              </div>
            </div>
            ';
          }
        } else {
          echo '<div class="col"><p>No se encontraron eventos.</p></div>';
        }

        // Cerrar conexión a la base de datos
        $conn->close();
        ?>
      </div>
    </div>
  </section>

  <!-- Sección de contacto -->
  <section id="contacto" class="py-5">
    <div class="container">
      <h2>Contacto</h2>
      <p>Información de contacto y formulario de contacto aquí.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer" class="py-4 bg-dark text-white text-center">
    <div class="container">
      <p>Todos los derechos reservados &copy; 2023</p>
    </div>
  </footer>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
