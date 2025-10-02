<?php

require_once __DIR__ . "/../../Modelo/Administrador/ModuloDetalle_Producto/Detalle_ProductoService.php";

class DetalleProductoController {
    private $detalleProductoService;

    public function __construct() {
        session_start(); // Asegurarse de que la sesión está iniciada

        if (!isset($_SESSION['token'])) {
            // Si no hay token, el usuario no está autenticado.
            // Se podría redirigir a la página de login o mostrar un error.
            header('HTTP/1.1 403 Forbidden');
            die("Acceso denegado. Se requiere autenticación.");
        }

        // Crear el servicio pasándole el token de la sesión
        $this->detalleProductoService = new DetalleProductoService($_SESSION['token']);
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

                    
                    $imagen = null;
                    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                        $nombreImagen = basename($_FILES['imagen']['name']);
                        $rutaTemporal = $_FILES['imagen']['tmp_name'];
                        $rutaDestino = __DIR__ . "/../uploads/" . $nombreImagen;

                        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                            $imagen = "uploads/" . $nombreImagen; 
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

       
        $detalles = $this->detalleProductoService->obtenerDetalles();
      return ['detalles' => $detalles, 'mensaje' => $mensaje];
    }
}
?>
