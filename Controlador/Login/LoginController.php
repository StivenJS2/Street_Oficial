<?php
// Controlador/Login/LoginController.php

require_once __DIR__ . '/../../Modelo/Login/LoginService.php';

class LoginController {
    private $loginService;
    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../../1.Conexion/conexion.php';
        $this->conn = Conectar::conexion();
        $this->loginService = new LoginService($this->conn);
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

            $usuario = $this->loginService->autenticar($correo, $contrasena);

            if ($usuario) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['datos']['id_' . ($usuario['tipo'] === 'cliente' ? 'cliente' : 'vendedor')];
                $_SESSION['usuario_nombre'] = $usuario['datos']['nombre'];
                $_SESSION['usuario_tipo'] = $usuario['tipo'];
                $_SESSION['usuario_correo'] = $usuario['datos']['correo_electronico'];

                // Redireccionar según tipo de usuario
                if ($usuario['tipo'] === 'administrador') {
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