<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Carrito de Compras - Siro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../../css/CarritoCompras/Carrito.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="container-barra d-flex px-3 py-1 text-dark align-items-center">

        <!--  menu lateral   -->

        <div id="logoScroll" class="logo font-weight-bold text-uppercase">
            <i class="bi bi-list fs-2" style="cursor:pointer;" data-bs-toggle="offcanvas" data-bs-target="#menuLateral"></i>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateral">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menú</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none">Inicio</a></li>
                    <li><a href="#" class="text-decoration-none">Catálogo</a></li>
                    <li><a href="#" class="text-decoration-none">Ofertas</a></li>
                    <li><a href="#" class="text-decoration-none">Contacto</a></li>
                </ul>
            </div>
        </div>


        <!-- logo -->
        <a href="../../Vista/PuntoInicio/Inicio.php" class="mx-auto logo">
            <img src="../../img/CarritoCompras/Logo.png" alt="Logo">
        </a>

        <!-- iconos(busqueda,loguin,carrito) -->
        <div class="botones d-flex align-items-center">
            <i class="bi bi-search" style="font-size: 20px; color: black; margin-right:8px;"></i>
            <input type="text" class="form-control form-control-sm rounded-pill mx-2" placeholder="Buscar..." aria-label="Buscar">

            <a href="#">
                <i class="bi bi-person" style="font-size: 24px; margin-left: 15px; color: black;"></i>
            </a>

            <a href="#">
                <i class="bi bi-cart" data-modal="modalCarrito" style="font-size: 24px; margin-left: 15px; color: black;"></i>
            </a>
        </div>
    </header>


    <!-- visualizacion de productos y resumen -->
    <main>
        <div class="container my-4">
            <div class="row">

                <div class="col-lg-8">
                    <h3 class="mb-4">Carrito</h3>

                    <div class="card mb-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-2 text-center">
                                <img src="../../img/CarritoCompras/Chaqueta-negra.png" class="img-fluid rounded" alt="Producto">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre del producto</h5>
                                    <p class="card-text text-muted">Descripción breve del producto</p>
                                    <p class="text-success">Disponible</p>
                                    <div class="d-flex align-items-center">
                                        <input type="number" value="1" class="form-control w-auto me-2" min="1">
                                        <button class="btn btn-link text-danger">Eliminar</button>
                                        <button class="btn btn-link">Guardar para más tarde</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 text-end pe-4">
                                <h5 class="text-dark">$99.99</h5>
                            </div>
                        </div>
                    </div>
                    </div>

                <div class="col-lg-4">
                    <div class="card p-3 shadow-sm">
                        <h5 class="mb-3">Resumen del pedido</h5>
                        <p class="d-flex justify-content-between">
                            <span>Subtotal (2 productos):</span>
                            <span class="fw-bold">$199.98</span>
                        </p>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="regalo">
                            <label class="form-check-label" for="regalo">Este pedido es un regalo</label>
                        </div>
                        <button class="btn btn-boton-pago w-100">Proceder al pago</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container my-5">
            <hr>
        </div>

        <!-- carrusel de productos -->
        <div class="container my-5">
            <h3 class="mb-4 text-center">Artículos destacados que te pueden gustar</h3>
            
            <div id="productosCarrusel" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productosCarrusel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#productosCarrusel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#productosCarrusel" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <div class="row row-cols-2 row-cols-md-4 g-4 justify-content-center">
                            <div class="col">
                                <div class="card h-100 text-center p-2">
                                    <img src="../../img/CarritoCompras/Chaqueta-gris.jpg" class="card-img-top mx-auto mt-2" alt="Producto Sugerido 1" style="height: 150px; width: auto; object-fit: contain;">
                                    <div class="card-body">
                                        <h6 class="card-title text-truncate">Nombre de producto sugerido 1</h6>
                                        <p class="text-danger small fw-bold">Oferta del día</p>
                                        <p class="card-text fw-bold">$45.99</p>
                                        <button class="btn btn-sm btn-boton-pago w-100">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="card h-100 text-center p-2">
                                    <img src="../../img/CarritoCompras/Jean-negro.jpg" class="card-img-top mx-auto mt-2" alt="Producto Sugerido 2" style="height: 150px; width: auto; object-fit: contain;">
                                    <div class="card-body">
                                        <h6 class="card-title text-truncate">Jean negro ancho</h6>
                                        <p class="text-muted small">Envío GRATIS</p>
                                        <p class="card-text fw-bold">$120.00</p>
                                        <button class="btn btn-sm btn-boton-pago w-100">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row row-cols-2 row-cols-md-4 g-4 justify-content-center">
                            
                            <div class="col">
                                <div class="card h-100 text-center p-2">
                                    <img src="../../img/CarritoCompras/Chaqueta-cafe.jpg" class="card-img-top mx-auto mt-2" alt="Producto Sugerido 3" style="height: 150px; width: auto; object-fit: contain;">
                                    <div class="card-body">
                                        <h6 class="card-title text-truncate">Chaqueta cafe </h6>
                                        <p class="text-muted small">50% de descuento</p>
                                        <p class="card-text fw-bold">$899.00</p>
                                        <button class="btn btn-sm btn-boton-pago w-100">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="card h-100 text-center p-2">
                                    <img src="../../img/CarritoCompras/Jean-azul.jpg" class="card-img-top mx-auto mt-2" alt="Producto Sugerido 4" style="height: 150px; width: auto; object-fit: contain;">
                                    <div class="card-body">
                                        <h6 class="card-title text-truncate">Jean azul</h6>
                                        <p class="text-success small">Disponible ahora</p>
                                        <p class="card-text fw-bold">$350.50</p>
                                        <button class="btn btn-sm btn-boton-pago w-100">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#productosCarrusel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productosCarrusel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </main>

    <!-- footer -->
    <footer class="footer-section container-fluid py-4 px-md-5 bg-black text-white">
        <div class="row text-center">
            
            <div class="col-md-4 mb-3">
                <h5 class="footer-title">Síguenos en</h5>
                <div class="d-flex justify-content-center social-icons-container gap-2">
                    <a href="#" class="social-icon-circle"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon-circle"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon-circle"><i class="bi bi-youtube"></i></a>
                    <a href="#" class="social-icon-circle"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <h5 class="footer-title">Acerca de STREET</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Aviso de Privacidad</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
                    <li><a href="#">Formas de pago</a></li>
                    <li><a href="#">Uso de Cookies</a></li>
                    <li><a href="#">Nuestro Catálogo</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-3">
                <h5 class="footer-title">Información adicional</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Política de Datos</a></li>
                    <li><a href="#">Contáctanos</a></li>
                    <li><a href="#">Registro</a></li>
                    <li><a href="#">Soporte</a></li>
                </ul>
            </div>

            <div class="col-12 mt-3">
                <p class="mb-0 small">
                    Sitio web creado por S.I.R.O. © 2025.<br>
                    Imágenes utilizadas con fines educativos, propiedad de Koaj® y Pull&Bear®.  
                </p>
            </div>
        </div>
    </footer>
    
     <script src="../../js/CarritoCompras/Carrito.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" 
            crossorigin="anonymous">
        </script>
</body>
</html>