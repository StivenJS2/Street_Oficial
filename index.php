<?php
$opcion = $_GET['opcion'] ?? '';

switch ($opcion) {
    case 'cliente':
        require_once __DIR__ . '/Controlador/ClienteController.php';
        $controller = new ClienteController();
        $controller->manejarPeticion();
        break;

    case 'vendedor':
        require_once __DIR__ . '/Controlador/VendedorController.php';
        $controller = new VendedorController();
        $controller->manejarPeticion();
        break;

    case 'login':
        require_once __DIR__ . '/Controlador/LoginController.php';
        $controller = new SesionController();
        $controller->manejarPeticion();
        break;

    default:
        include __DIR__ . '/Vista/PuntoInicio/Inicio.php';
        break;
}
?>
