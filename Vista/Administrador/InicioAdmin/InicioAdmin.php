
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/Administrador/InicioAdmin/InicioAdmin.css">


<body>
  <div class="sidebar" id="sidebar">
    <div class="header">
      <img src="../../img/logo.png" alt="Logo" class="logo">
      <h3><span class="title-text">Street Admin</span></h3>
    </div>

    <ul class="menu">
      <li class="active"><a href="#"><i class="fas fa-home"></i><span> Inicio</span></a></li>
      <li><a href="?opcion=cliente"><i class="fas fa-user"></i><span> Cliente</span></a></li>
      <li><a href="?opcion=vendedor"><i class="fas fa-user-tie"></i><span> Vendedor</span></a></li>
      <li><a href="?opcion=pedido"><i class="fas fa-shopping-cart"></i><span> Pedido</span></a></li>
      <li><a href="?opcion=producto"><i class="fas fa-box"></i><span> Producto</span></a></li>
      <li><a href="?opcion=detalle_producto"><i class="fas fa-tags"></i><span> Detalle Producto</span></a></li>
      <li><a href="?opcion=categoria"><i class="fas fa-layer-group"></i><span> Categoría</span></a></li>
      <li><a href="?opcion=promocion"><i class="fas fa-percent"></i><span> Promoción</span></a></li>
      <li><a href="?opcion=valoracion"><i class="fas fa-star"></i><span> Valoración</span></a></li>
    </ul>

    <div class="footer">
      <button class="logout"><i class="fas fa-sign-out-alt"></i><span> Cerrar sesión</span></button>

      <label class="toggle" for="darkmode">
        <i class="fas fa-moon"></i>
        <span> Modo Oscuro</span>
        <input type="checkbox" id="darkmode" />
      </label>

      <button id="collapse" aria-label="Colapsar sidebar">
    <i class="fas fa-angle-double-left"></i>
    <span> Colapsar</span>
  </button>
    </div>
  </div>

  <div class="content">
    <h2>Bienvenido al Área Administrativa</h2>
    <p>Selecciona una opción en el menú lateral</p>
  </div>


  <script src="../../js/Administrador/InicioAdmin/inicioAdmin.js" defer></script>
</body>


