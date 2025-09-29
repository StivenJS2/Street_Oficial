<?php
$opcion = $_GET['opcion'] ?? '';

if ($opcion === 'cliente') {
    require_once __DIR__ . '/../../Controlador/Administrador/ClienteController.php';
    $controller = new ClienteController();
    $controller->manejarPeticion();
} 

elseif ($opcion === 'vendedor') {
    require_once __DIR__ . '/../../Controlador/Administrador/VendedorController.php';
    $controller = new VendedorController();
    $controller->manejarPeticion();
} 

elseif ($opcion === 'pedido') {
    require_once __DIR__ . '/../../Controlador/Administrador/PedidoController.php';
    $controller = new PedidoController();
    $controller->manejarPeticion();
} 

elseif ($opcion === 'producto') {
    require_once __DIR__ . '/../../Controlador/Administrador/ProductoController.php';
    $controller = new ProductoController();
    $controller->manejarPeticion();
} 

elseif ($opcion === 'detalle_producto') {
    require_once __DIR__ . '/../../Controlador/Administrador/Detalle_ProductoController.php';
    $controller = new DetalleProductoController();
    $controller->manejarPeticion();
} 

elseif ($opcion === 'categoria') {
    require_once __DIR__ . '/../../Controlador/Administrador/CategoriaController.php';
    $controller = new CategoriaController();
    $controller->manejarPeticion();
} 


elseif ($opcion === 'promocion') {
    require_once __DIR__ . '/../../Controlador/Administrador/PromocionController.php';
    $controller = new PromocionController();
    $controller->manejarPeticion();
}

elseif ($opcion === 'valoracion') {
    require_once __DIR__ . '/../../Controlador/Administrador/ValoracionController.php';
    $controller = new ValoracionController();
    $controller->manejarPeticion();
} 
else {
    require_once __DIR__ . '/../../Vista/Administrador/InicioAdmin/InicioAdmin.php';
}

    ?>

    


