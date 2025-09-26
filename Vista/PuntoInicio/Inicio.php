<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/PuntoInicio/Inicio.css">
</head>

<body>

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-light px-4 fixed-top">

          <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="#">
              <i class="bi bi-bag-check-fill me-2"></i> MiTienda
            </a>

            <div class="collapse navbar-collapse justify-content-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Hombre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Mujer</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Lo mejor de la moda</a>
                </li>
              </ul>
            </div>


            <div class="d-flex align-items-center gap-3">

              <form class="d-flex custom-search">
                <div class="input-group">

                  <input class="form-control rounded-pill" type="search" placeholder="Buscar..." aria-label="Buscar">

                    <span class="input-group-text bg-white border-0 rounded-pill ms-n5">
                      <i class="bi bi-search"></i>
                    </span>

                </div>
              </form>

              <div class="dropdown">
                <a href="#" class="text-dark fs-5 dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">Sign In</a></li>
                  <li><a class="dropdown-item" href="#">Sign Up</a></li>
                </ul>
              </div>

              <a href="#" class="text-dark fs-5">
                <i class="bi bi-cart3"></i>
              </a>
            </div>
          </div>
      </nav>


      <!-- CARRUSEL -->
    <div id="carruselProductos" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="2000">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <div class="d-flex justify-content-center gap-3">
            <img src="/img/PuntoInicio/2.chaquetaGris.jpg" class="d-block w-25 rounded" alt="Producto 1">
            <img src="/img/PuntoInicio/1.chaquetaGris.jpg" class="d-block w-25 rounded" alt="Producto 2">
            <img src="/img/PuntoInicio/3.chaquetaGris.jpg" class="d-block w-25 rounded" alt="Producto 3">
          </div>
        </div>

        <div class="carousel-item">
          <div class="d-flex justify-content-center gap-3">
            <img src="/img/PuntoInicio/2.chaquetaCafe.jpg" class="d-block w-25 rounded" alt="Producto 4">
            <img src="/img/PuntoInicio/1.chaquetaCafe.jpg" class="d-block w-25 rounded" alt="Producto 5">
            <img src="/img/PuntoInicio/3.chaquetaCafe.jpg" class="d-block w-25 rounded" alt="Producto 6">
          </div>
        </div>

        <div class="carousel-item">
          <div class="d-flex justify-content-center gap-3">
            <img src="/img/PuntoInicio/2.chaquetaNegra.jpg" class="d-block w-25 rounded" alt="Producto 7">
            <img src="/img/PuntoInicio/1.chaquetaNegra.jpg" class="d-block w-25 rounded" alt="Producto 8">
            <img src="/img/PuntoInicio/3.chaquetaNegra.jpg" class="d-block w-25 rounded" alt="Producto 9">
          </div>
        </div>

      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carruselProductos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carruselProductos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>


    <!-- Cards -->

    <div class="container-fluid bg-light text-dark py-5 my-3">
    <div class="container">

    <h2 class="text-center mb-4">La moda la puedes inventar tú.</h2>

        <div class="container my-5">
          <div class="row g-4">

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/1.chaquetaCafe.jpg" class="card-img-top" alt="Chaqueta Café">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Café</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Café" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Café"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/1.chaquetaNegra.jpg" class="card-img-top" alt="Chaqueta Negra">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Negra</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Negra" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Negro"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/2.chaquetaGris.jpg" class="card-img-top" alt="Chaqueta Gris">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Gris</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Gris" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Gris"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/1.chaquetaCafe.jpg" class="card-img-top" alt="Chaqueta Café">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Café</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Café" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Café"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/1.chaquetaNegra.jpg" class="card-img-top" alt="Chaqueta Negra">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Negra</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Negra" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Negro"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/2.chaquetaGris.jpg" class="card-img-top" alt="Chaqueta Gris">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Gris</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Gris" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Gris"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/1.chaquetaCafe.jpg" class="card-img-top" alt="Chaqueta Café">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Café</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Café" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Café"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/1.chaquetaNegra.jpg" class="card-img-top" alt="Chaqueta Negra">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Negra</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Negra" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Negro"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="card h-100">
                    <img src="/img/PuntoInicio/2.chaquetaGris.jpg" class="card-img-top" alt="Chaqueta Gris">
                    <div class="card-body text-center">
                      <h5 class="card-title">Chaqueta Gris</h5>
                      <button class="btn btn-dark ver-detalle" 
                              data-nombre="Chaqueta Gris" 
                              data-descripcion="Chaqueta de algodón suave y cálida."
                              data-categoria="Casual"
                              data-color="Gris"
                              data-talla="M">
                        Ver más
                      </button>
                    </div>
                  </div>
                </div>


        </div>

      </div>


          <!-- Modal Para las tarjetas -->

          <div class="modal fade" id="detalleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                
                <div class="modal-header bg-dark text-white">
                  <h5 class="modal-title" id="modalNombre"></h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                  <p id="modalDescripcion"></p>
                  <p><strong>Categoría:</strong> <span id="modalCategoria"></span></p>
                  <p><strong>Color:</strong> <span id="modalColor"></span></p>
                  <p><strong>Talla:</strong> <span id="modalTalla"></span></p>
                </div>

                <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

              </div>
            </div>
          </div>


    </div>
  </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/PuntoInicio/Inicio.js"></script>
</body>
</html>
