  $(document).ready(function() {
      // Obtener datos del API para el slider
      $.get("api/slider.php", function(data) {
        data.forEach(function(slider) {
          $(".carousel-inner").append(`
            <div class="carousel-item">
              <img src="${slider.imagen}" alt="${slider.descripcion}" class="d-block w-100">
            </div>
          `);
        });
        $(".carousel-item").first().addClass("active");
      });

      // Obtener datos del API para las noticias
      $.get("api/noticias.php", function(data) {
        data.forEach(function(noticia) {
          $("#noticias-container").append(`
            <div class="col-md-4">
              <div class="card mb-4">
                <img src="${noticia.imagen}" class="card-img-top" alt="${noticia.titulo}">
                <div class="card-body">
                  <h5 class="card-title">${noticia.titulo}</h5>
                  <p class="card-text">${noticia.fecha_publicacion}</p>
                  <p class="card-text">${noticia.contenido}</p>
                </div>
              </div>
            </div>
          `);
        });
      });

      // Obtener datos del API para los eventos
      $.get("api/eventos.php", function(data) {
        data.forEach(function(evento) {
          $("#eventos-container").append(`
            <div class="col-md-4">
              <div class="card mb-4">
                <img src="${evento.imagen}" class="card-img-top" alt="${evento.titulo}">
                <div class="card-body">
                  <h5 class="card-title">${evento.titulo}</h5>
                  <h5 class="card-title">${evento.lugar}</h5>
                  <p class="card-text">${evento.fecha}</p>
                  <p class="card-text">${evento.descripcion}</p>
                </div>
              </div>
            </div>
          `);
        });
      });
    });