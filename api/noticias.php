<?php
// Realizar la conexión a la base de datos MySQL
$conexion = new mysqli("localhost", "root", "", "landing_page");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos de noticias desde la base de datos
$sql = "SELECT * FROM noticias";
$resultado = $conexion->query($sql);

// Preparar un array para almacenar los datos de las noticias
$noticias = [];

// Recorrer los resultados y agregarlos al array
while ($fila = $resultado->fetch_assoc()) {
    $noticias[] = [
        "titulo" => $fila["titulo"],
        "fecha_publicacion" => $fila["fecha_publicacion"],
        "contenido" => $fila["contenido"],
        "imagen" => $fila["imagen"]
    ];
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Devolver los datos como respuesta en formato JSON
header("Content-Type: application/json");
echo json_encode($noticias);
?>
