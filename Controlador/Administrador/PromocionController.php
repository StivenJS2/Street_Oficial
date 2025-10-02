<?php
require_once __DIR__ . "/../../Modelo/Administrador/ModuloPromocion/PromocionService.php";

class PromocionController {
    private $promocionService;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['token'])) {
            die("Acceso denegado. Se requiere autenticación.");
        }

        $this->promocionService = new PromocionService($_SESSION['token']);
    }

    public function manejarPeticion() {
        $mensaje = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["_action"] ?? "";

            switch ($accion) {
                case "agregar":
                    $descripcion = trim($_POST['descripcion'] ?? '');
                    $descuento = trim($_POST['descuento'] ?? '');
                    $fecha_inicio = trim($_POST['fecha_inicio'] ?? '');
                    $fecha_fin = trim($_POST['fecha_fin'] ?? '');
                    $id_producto = trim($_POST['id_producto'] ?? '');

                    if ($descripcion && $descuento && $fecha_inicio && $fecha_fin && $id_producto) {
                        $resultado = $this->promocionService->crearPromocion(
                            $descripcion, $descuento, $fecha_inicio, $fecha_fin, $id_producto
                        );
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Promoción agregada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                    }
                    break;

                case "actualizar":
                    $id_promocion = $_POST['id_promocion'] ?? null;
                    $descripcion = trim($_POST['descripcion'] ?? '');
                    $descuento = trim($_POST['descuento'] ?? '');
                    $fecha_inicio = trim($_POST['fecha_inicio'] ?? '');
                    $fecha_fin = trim($_POST['fecha_fin'] ?? '');
                    $id_producto = trim($_POST['id_producto'] ?? '');

                    if ($id_promocion && $descripcion && $descuento && $fecha_inicio && $fecha_fin && $id_producto) {
                        $resultado = $this->promocionService->actualizarPromocion(
                            $id_promocion, $descripcion, $descuento, $fecha_inicio, $fecha_fin, $id_producto
                        );
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Promoción actualizada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                    }
                    break;

                case "eliminar":
                    $id_promocion = $_POST['id_promocion'] ?? null;

                    if ($id_promocion) {
                        $resultado = $this->promocionService->eliminarPromocion($id_promocion);
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Promoción eliminada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>El ID de la promoción es obligatorio.</p>";
                    }
                    break;
            }
        }

        
        $resultado = $this->promocionService->obtenerPromociones();
        $promociones = $resultado["success"] ? $resultado["data"] : [];
         return ['promociones' => $promociones, 'mensaje' => $mensaje];


       
    }
}
?>
