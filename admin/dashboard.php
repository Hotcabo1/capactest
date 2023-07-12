<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administracion</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
 <style> 

 .card{
  transition: all 0.2s ease;
  cursor: pointer;
  margin: 2rem;
  box-shadow: 5px 6px 6px 2px #e9ecef;
 }
.card:hover{
  box-shadow: 2px 3px 3px 1px #e9ecef;
  transform: scale(1.05);
}


</style>


<!-- Barra de navegación -->
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
              <a class="nav-link" href="eventos.php">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="noticias.php">Noticias</a>
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
  <h2 class="my-4">Eventos proximos</h2>

    <div class="card-group">
      <div id="eventosTableBody1">
       <!-- Filas de eventos generadas por JavaScript -->    
      </div> 
    </div>

    
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../admin/evento/js/script1.js"></script>

</body>
</html>
