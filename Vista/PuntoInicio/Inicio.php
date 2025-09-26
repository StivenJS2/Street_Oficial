<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Online</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- CSS propio -->
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <div class="container-fluid">

      <!-- Logo -->
      <a class="navbar-brand fw-bold" href="#">
        <i class="bi bi-bag-check-fill me-2"></i> MiTienda
      </a>

      <!-- Catálogos -->
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

      <!-- Buscador + Perfil + Carrito -->
      <div class="d-flex align-items-center gap-3">

        <!-- Buscador -->
        <form class="d-flex custom-search">
          <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
          <button class="btn btn-outline-light" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </form>

        <!-- Perfil -->
        <div class="dropdown">
          <a href="#" class="text-white fs-5 dropdown-toggle" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Sign In</a></li>
            <li><a class="dropdown-item" href="#">Sign Up</a></li>
          </ul>
        </div>

        <!-- Carrito -->
        <a href="#" class="text-white fs-5">
          <i class="bi bi-cart3"></i>
        </a>
      </div>
    </div>
  </nav>

  <!-- Scripts Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
