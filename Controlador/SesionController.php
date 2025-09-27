<?php
require_once __DIR__ . "/../Modelo/ModuloLogin/LoginService.php";

class LoginController {
    private $loginService;

    public function __construct() {
        $this->loginService = new LoginService();
    }

    public function manejarPeticion() {
        session_start();
        $mensaje = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = trim($_POST['correo'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!empty($correo) && !empty($password)) {
                $usuario = $this->loginService->validarUsuario($correo, $password);

                if ($usuario) {
                    // Guardar sesión
                    $_SESSION['usuario_id'] = $usuario['id'];
                    $_SESSION['correo'] = $usuario['correo'];
                    $_SESSION['rol'] = $usuario['rol'];

                    // Redirigir según rol
                    if ($usuario['rol'] === 'cliente') {
                        header("Location: Vista/PuntoInicio/Inicio.php");
                        exit();
                    } elseif ($usuario['rol'] === 'vendedor') {
                        header("Location: Vista/Administrador/PanelAdmin.php");
                        exit();
                    }
                } else {
                    $mensaje = "Correo o contraseña incorrectos.";
                }
            } else {
                $mensaje = "Por favor ingresa todos los campos.";
            }
        }

        include __DIR__ . "/../Vista/Login/Login.php";
    }
}
?>
