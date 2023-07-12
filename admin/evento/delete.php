<?php
// Conexión a la base de datos
require_once '../../admin/conected.php';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener ID del evento a eliminar
$id = $_POST['id'];

// Obtener nombre de la imagen del evento a eliminar
$sqlSelect = "SELECT imagen FROM eventos WHERE id = $id";
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $imagen = $row['imagen'];
  unlink('carpeta_imagenes/' . $imagen);
}

// Eliminar evento de la base de datos
$sql = "DELETE FROM eventos WHERE id = $id";
if ($conn->query($sql) === TRUE) {
  echo 'success';
} else {
  echo 'error';
}

$conn->close();
