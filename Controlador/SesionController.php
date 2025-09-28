<?php
require_once __DIR__ . "/../Modelo/SesionService.php";

class SesionController {
    private $loginService;

    public function __construct() {
        $this->loginService = new SesionService();
    }

    public function manejarPeticion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["_action"] ?? "";

            if ($accion === "login") {
                $correo = $_POST["correo"] ?? "";
                $contrasena = $_POST["contrasena"] ?? "";

                $rol = $this->loginService->validarUsuario($correo, $contrasena);

                if ($rol === "cliente") {
                    header("Location: ../Vista/pagina_principal.php");
                    exit();
                } elseif ($rol === "administrador") {
                    header("Location: ../Vista/pagina_admin.php");
                    exit();
                } else {
                    echo "<script>alert('Correo o contraseña incorrectos'); window.location='../Vista/login.php';</script>";
                }
            }
        }
    }
}

$controller = new SesionController();
$controller->manejarPeticion();
