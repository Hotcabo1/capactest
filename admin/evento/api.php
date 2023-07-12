<?php
header('Content-Type: application/json');

// Conexión a la base de datos
require_once '../../admin/conected.php';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
  die('Error de conexión: ' . $conn->connect_error);
}

// Obtener eventos
$sql = "SELECT * FROM eventos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $eventos = array();

  while ($row = $result->fetch_assoc()) {
    $evento = array(
      'id' => $row['id'],
      'titulo' => $row['titulo'],
      'fecha_evento' => $row['fecha_evento'],
      'lugar' => $row['lugar'],
      'descripcion' => $row['descripcion'],
      'imagen' => $row['imagen']
    );

    array_push($eventos, $evento);
  }

  echo json_encode(array('eventos' => $eventos));
} else {
  echo json_encode(array('eventos' => array()));
}

$conn->close();
