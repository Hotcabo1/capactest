$(document).ready(function() {
  $('#loginForm').submit(function(e) {
    e.preventDefault();

    var email = $('#email').val();
    var password = $('#password').val();

    $.ajax({
      url: '../admin/api_conected.php',
      type: 'POST',
      data: {
        email: email,
        password: password
      },
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          // Inicio de sesión exitoso, redirige al dashboard
          window.location.href = 'dashboard.php';
        } else {
          // Error de inicio de sesión, muestra el mensaje de error
          alert(response.message);
        }
      },
      error: function() {
        alert('Error de conexión');
      }
    });
  });
});
