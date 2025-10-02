<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/Login/Login.css">

  <title>Iniciar Sesión</title>
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

  <div class="card shadow-lg p-5 rounded-4" style="max-width: 500px; width:100%;">
    <div class="text-center mb-4">
      <i class="bi bi-person-circle fs-1 text-primary"></i>
      <h2 class="mt-2 fw-bold text-dark">Iniciar Sesión</h2>
      <p class="text-muted">Accede con tus credenciales</p>
    </div>

    <form action="/index.php?opcion=login&accion=procesar" method="POST">
      <div class="mb-3">
        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" placeholder="ejemplo@correo.com" required>
        </div>
      </div>

      <div class="mb-3">
  <label for="contrasena" class="form-label">Contraseña</label>
  <div class="input-group">
    <span class="input-group-text"><i class="bi bi-lock"></i></span>
    <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="********" required>
    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
      <i class="bi bi-eye"></i>
    </span>
  </div>
</div>


      <button type="submit" class="btn btn-primary w-100 rounded-3 mb-3">
        <i class="bi bi-box-arrow-in-right me-2"></i>Ingresar
      </button>
    </form>

    <!-- Enlaces extras -->
    <div class="d-flex flex-column text-center">
      <a href="/index.php?opcion=recuperar" class="text-decoration-none mb-2">
        <i class="bi bi-key"></i> ¿Olvidaste tu contraseña?
      </a>
      <a href="/index.php?opcion=registro" class="text-decoration-none fw-bold text-primary">
        <i class="bi bi-person-plus"></i> Crea tu cuenta aquí
      </a>
    </div>

    <?php
      if (isset($_GET['error'])) {
          $error = $_GET['error'];
          $mensaje = '';
          if ($error === 'credenciales_invalidas') {
              $mensaje = 'El correo o la contraseña son incorrectos.';
          } elseif ($error === 'campos_vacios') {
              $mensaje = 'Por favor, complete todos los campos.';
          }
          if ($mensaje) {
              echo "<div class='alert alert-danger text-center mt-3 p-2'>$mensaje</div>";
          }
      }
    ?>
  </div>

  <script src="/js/Login/Login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

