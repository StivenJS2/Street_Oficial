<?php
require_once __DIR__ . "/../../Modelo/Administrador/ModuloValoracion/ValoracionService.php";

class ValoracionController {
    private $valoracionService;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['token'])) {
            die("Acceso denegado. Se requiere autenticación.");
        }

        $this->valoracionService = new ValoracionService($_SESSION['token']);
    }

    public function manejarPeticion() {
        $mensaje = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["_action"] ?? "";

            switch ($accion) {
                case "eliminar":
                    $id_valoracion = $_POST["id_valoracion"] ?? null;

                    if ($id_valoracion) {
                        $resultado = $this->valoracionService->eliminarValoracion($id_valoracion);
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Valoración eliminada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>El ID de la valoración es obligatorio.</p>";
                    }
                    break;
            }
        }

        $resultado = $this->valoracionService->obtenerValoraciones();
        $valoraciones = $resultado["success"] ? $resultado["data"] : [];
         return ['valoraciones' => $valoraciones, 'mensaje' => $mensaje];

      
    }
}
?>
