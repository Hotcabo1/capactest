<?php
// Conexión a la base de datos
require_once '../../admin/conected.php';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$imagen = $_FILES['imagen'];

// Actualizar imagen si se proporciona una nueva
if (!empty($imagen['name'])) {
  // Eliminar imagen anterior
  $sqlSelect = "SELECT imagen FROM eventos WHERE id = $id";
  $result = $conn->query($sqlSelect);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imagenAnterior = $row['imagen'];
    unlink('../admin/carpeta_imagenes/' . $imagenAnterior);
  }

  // Guardar nueva imagen en carpeta
  $imagenNombre = $imagen['name'];
  $imagenTmp = $imagen['tmp_name'];
  $imagenPath = '../admin/carpeta_imagenes/' . $imagenNombre;

  move_uploaded_file($imagenTmp, $imagenPath);

  // Actualizar evento en la base de datos con la nueva imagen
  $sql = "UPDATE eventos SET titulo = '$titulo', fecha_evento = '$fecha', lugar = '$lugar',
          descripcion = '$descripcion', imagen = '$imagenNombre' WHERE id = $id";
} else {
  // Actualizar evento en la base de datos sin cambiar la imagen
  $sql = "UPDATE eventos SET titulo = '$titulo', fecha_evento = '$fecha', lugar = '$lugar',
          descripcion = '$descripcion' WHERE id = $id";
}

if ($conn->query($sql) === TRUE) {
  echo 'success';
} else {
  echo 'error';
}

$conn->close();
