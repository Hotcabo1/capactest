<?php
// Conexión a la base de datosv

ini_set('log_errors',1);
ini_set('error_log','/absolute/path/tp/log_file');

require_once '../../admin/conected.php';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener datos del formulario
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$descripcion = $_POST['descripcion'];
$imagen = $_FILES['imagen'];

// Guardar imagen en carpeta
$imagenNombre = $imagen['name'];
$imagenTmp = $imagen['tmp_name'];
$imagenNombre=str_replace(" ","_",$imagenNombre);
$imagenPath = '../admin/carpeta_imagenes/' . $imagenNombre;

move_uploaded_file($imagenTmp, $imagenPath);

// Insertar evento en la base de datos
$sql = "INSERT INTO eventos (titulo, fecha_evento, lugar, descripcion, imagen)
        VALUES ('$titulo', '$fecha', '$lugar', '$descripcion', '$imagenNombre')";
if ($conn->query($sql) === TRUE) {
  echo 'success';
} else {
  echo 'error';
}

$conn->close();
