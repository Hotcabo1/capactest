<?php
require'../admin/conected.php';

// Endpoint para el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Consulta para verificar las credenciales del usuario
  $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    // Inicio de sesión exitoso
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['user_id'] = $user['id'];
    echo json_encode(['status' => 'success']);
  } else {
    // Credenciales incorrectas
    echo json_encode(['status' => 'error', 'message' => 'Contraseña o Usuario incorrecto']);
  }
}

// Endpoint para cerrar sesión
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {
  session_start();
  session_destroy();
  echo json_encode(['status' => 'success']);
}
?>
