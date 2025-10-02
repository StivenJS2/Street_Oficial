<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Street Admin</title>
  <link rel="stylesheet" href="../../css/Administrador/InicioAdmin/InicioAdmin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="sidebar" id="sidebar">
    <div class="header">
      <img src="../../img/logoStreet.jpg" alt="Logo" class="logo">
      <h3><span class="title-text">Street Admin</span></h3>
    </div>
    <ul class="menu">
      <li><a href="index.php?opcion=inicio"><i class="fas fa-home"></i><span> Inicio</span></a></li>
      <li><a href="index.php?opcion=cliente"><i class="fas fa-user"></i><span> Cliente</span></a></li>
      <li><a href="index.php?opcion=vendedor"><i class="fas fa-user-tie"></i><span> Vendedor</span></a></li>
      <li><a href="index.php?opcion=pedido"><i class="fas fa-shopping-cart"></i><span> Pedido</span></a></li>
      <li><a href="index.php?opcion=producto"><i class="fas fa-box"></i><span> Producto</span></a></li>
      <li><a href="index.php?opcion=detalle_producto"><i class="fas fa-tags"></i><span> Detalle Producto</span></a></li>
      <li><a href="index.php?opcion=categoria"><i class="fas fa-layer-group"></i><span> Categoría</span></a></li>
      <li><a href="index.php?opcion=promocion"><i class="fas fa-percent"></i><span> Promoción</span></a></li>
      <li><a href="index.php?opcion=valoracion"><i class="fas fa-star"></i><span> Valoración</span></a></li>
    </ul>
    <div class="footer">
      <button href="index.php?opcion=login" class="logout"><i class="fas fa-sign-out-alt"></i><span> Cerrar sesión</span></button>
      <label class="toggle" for="darkmode">
        <i class="fas fa-moon"></i><span> Modo Oscuro</span>
        <input type="checkbox" id="darkmode" />
      </label>

      <button id="collapse" aria-label="Colapsar sidebar">
    <i class="fas fa-angle-double-left"></i>
    <span> Colapsar</span>
  </button>

    </div>
  </div>

  <div class="content p-4">
    <?php 
      if (isset($contenido)) {
        require $contenido; 
      }
    ?>
  </div>

  <script src="../../js/Administrador/InicioAdmin/inicioAdmin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
