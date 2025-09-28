<?php

require_once __DIR__ . "/../Modelo/ModuloDetalle_Producto/Detalle_ProductoService.php";

class DetalleProductoController {
    private $detalleProductoService;

    public function __construct() {
        $this->detalleProductoService = new DetalleProductoService();
    }

    public function manejarPeticion() {
        $mensaje = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["_action"] ?? "";

            switch ($accion) {
                case "agregar":
                    $talla = trim($_POST['talla'] ?? '');
                    $color = trim($_POST['color'] ?? '');
                    $id_producto = trim($_POST['id_producto'] ?? '');
                    $id_categoria = trim($_POST['id_categoria'] ?? '');
                    $precio = trim($_POST['precio'] ?? '');

                    // Manejo de imagen
                    $imagen = null;
                    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                        $nombreImagen = basename($_FILES['imagen']['name']);
                        $rutaTemporal = $_FILES['imagen']['tmp_name'];
                        $rutaDestino = __DIR__ . "/../uploads/" . $nombreImagen;

                        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                            $imagen = "uploads/" . $nombreImagen; // ruta que se guarda en BD
                        }
                    }

                    if ($talla && $color && $imagen && $id_producto && $id_categoria && $precio) {
                        $resultado = $this->detalleProductoService->agregarDetalle(
                            $talla, $color, $imagen, $id_producto, $id_categoria, $precio
                        );
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Detalle agregado correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                    }
                    break;

                case "actualizar":
                    $id_detalle = $_POST["id_detalle_producto"] ?? null;
                    $talla = trim($_POST['talla'] ?? '');
                    $color = trim($_POST['color'] ?? '');
                    $id_producto = trim($_POST['id_producto'] ?? '');
                    $id_categoria = trim($_POST['id_categoria'] ?? '');
                    $precio = trim($_POST['precio'] ?? '');

                    // Manejo de imagen (puede no actualizarse)
                    $imagen = null;
                    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                        $nombreImagen = basename($_FILES['imagen']['name']);
                        $rutaTemporal = $_FILES['imagen']['tmp_name'];
                        $rutaDestino = __DIR__ . "/../uploads/" . $nombreImagen;

                        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                            $imagen = "uploads/" . $nombreImagen;
                        }
                    }

                    if ($id_detalle && $talla && $color && $id_producto && $id_categoria && $precio) {
                        $resultado = $this->detalleProductoService->actualizarDetalle(
                            $id_detalle, $talla, $color, $imagen, $id_producto, $id_categoria, $precio
                        );
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Detalle actualizado correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>Todos los campos son obligatorios.</p>";
                    }
                    break;

                case "eliminar":
                    $id_detalle = $_POST["id_detalle_producto"] ?? null;

                    if ($id_detalle) {
                        $resultado = $this->detalleProductoService->eliminarDetalle($id_detalle);
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Detalle eliminado correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>El ID del detalle es obligatorio.</p>";
                    }
                    break;
            }
        }

        // Obtener todos los detalles de producto
        $detalles = $this->detalleProductoService->obtenerDetalles();

        // Cargar la vista
        require __DIR__ . "/../Vista/Administrador/Detalle_Producto.php";
    }
}
?>
