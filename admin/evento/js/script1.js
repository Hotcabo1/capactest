$(document).ready(function() {
    // Cargar eventos al cargar la página
    loadEventos();

 
 // Cargar eventos desde la API
 function loadEventos() {
    $.ajax({
      url: '../admin/evento/api.php',
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        var eventos = response.eventos;
        var tableBody = $('#eventosTableBody1');
        tableBody.empty();

        eventos.forEach(function(evento) {
          var row = `
       <div class="card">
          <div class="card-header">
          <h3 class="card-title">${evento.titulo}</h5>
        </div>
         <img src="carpeta_imagenes/${evento.imagen}" alt="Imagen del Evento" class="img-thumbnail card-img-top"></img>
         <div class="col">
            <div class="card-body">                
              <h5 class="card-text">Descripcion:</h5>
              <p class="card-text">${evento.descripcion}</p>
              <h5 class="card-text">Lugar del Evento:</h5>
              <p class="card-text">${evento.lugar}</p>
             </div>
             <div class="card-footer text-body-secondary">
              <p class="card-text"><small class="text-body-secondary">${evento.fecha_evento}</small></p>
             </div>           
            </div>
            </div>
        <div>

          `;
          tableBody.append(row);
        });
      },
      error: function() {
        alert('Ocurrió un error al cargar los eventos. Por favor, intenta nuevamente.');
      }
    });
  }
});

{/* <img src="carpeta_imagenes/${evento.imagen}" alt="Imagen del Evento" class="card-img"> */}


{/* <img src="carpeta_imagenes/${evento.imagen}" alt="Imagen del Evento" class="img-thumbnail card-img-top"></img> */}