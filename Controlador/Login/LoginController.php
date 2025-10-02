<?php
// Controlador/Login/LoginController.php

require_once __DIR__ . '/../../Modelo/Login/LoginService.php';

class LoginController {
    private $loginService;

    public function __construct() {
        $this->loginService = new LoginService();
    }

    public function manejarPeticion() {
        $accion = $_GET['accion'] ?? 'mostrar';

        switch ($accion) {
            case 'mostrar':
                $this->mostrarLogin();
                break;
            case 'procesar':
                $this->procesarLogin();
                break;
            case 'logout':
                $this->cerrarSesion();
                break;
            default:
                $this->mostrarLogin();
                break;
        }
    }

    private function mostrarLogin() {
        require_once __DIR__ . '/../../Vista/Login/Login.php';
    }

    private function procesarLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo_electronico'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            if (empty($correo) || empty($contrasena)) {
                header('Location: index.php?opcion=login&error=campos_vacios');
                exit();
            }

            $resultado = $this->loginService->autenticar($correo, $contrasena);

            if ($resultado) {
                session_start();
                $_SESSION['token'] = $resultado['token'];
                $_SESSION['usuario_id'] = $resultado['datos']['id_' . ($resultado['tipo'] === 'cliente' ? 'cliente' : 'vendedor')];
                $_SESSION['usuario_nombre'] = $resultado['datos']['nombre'];
                $_SESSION['usuario_tipo'] = $resultado['tipo'];
                $_SESSION['usuario_correo'] = $resultado['datos']['correo_electronico'];

                if ($resultado['tipo'] === 'administrador') {
                    header('Location: Vista/Administrador/index.php');
                } else {
                    header('Location: index.php');
                }
                exit();
            } else {
                header('Location: index.php?opcion=login&error=credenciales_invalidas');
                exit();
            }
        }
    }

    private function cerrarSesion() {
        session_start();
        session_destroy();
        header('Location: index.php?opcion=login');
        exit();
    }
}
?>