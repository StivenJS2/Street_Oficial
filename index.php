<?php
$opcion = $_GET['opcion'] ?? '';

switch ($opcion) {

    case 'vendedor':
        require_once __DIR__ . '/Controlador/Administrador/VendedorController';
        $controller = new VendedorController();
        $controller->manejarPeticion();
        break;
        
    case 'login':
        require_once __DIR__ . '/Controlador/Login/LoginController.php';
        $controller = new LoginController();
        $controller->manejarPeticion();
        break;


    default:
        include __DIR__ . '/Vista/PuntoInicio/Inicio.php';
        break;

}
?>
