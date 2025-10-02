<?php

require_once __DIR__ . "/../../Modelo/Administrador/ModuloCategoria/CategoriaService.php";

class CategoriaController {
    private $categoriaService;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['token'])) {
            die("Acceso denegado. Se requiere autenticación.");
        }

        $this->categoriaService = new CategoriaService($_SESSION['token']);
    }
   
    public function manejarPeticion() {
        $mensaje = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["_action"] ?? "";

            switch ($accion) {
                case "agregar":
                    $nombre = trim($_POST['nombre'] ?? '');

                    if ($nombre) {
                        $resultado = $this->categoriaService->agregarCategoria($nombre);
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Categoría agregada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>El nombre es obligatorio.</p>";
                    }
                    break;

                case "actualizar":
                    $id_categoria = $_POST["id_categoria"] ?? null;
                    $nombre = trim($_POST['nombre'] ?? '');

                    if ($id_categoria && $nombre) {
                        $resultado = $this->categoriaService->actualizarCategoria($id_categoria, $nombre);
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Categoría actualizada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>El ID y el nombre son obligatorios.</p>";
                    }
                    break;

                case "eliminar":
                    $id_categoria = $_POST["id_categoria"] ?? null;

                    if ($id_categoria) {
                        $resultado = $this->categoriaService->eliminarCategoria($id_categoria);
                        $mensaje = $resultado["success"]
                            ? "<p style='color:green;'>Categoría eliminada correctamente</p>"
                            : "<p style='color:red;'>Error: " . $resultado["error"] . "</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>El ID de la categoría es obligatorio.</p>";
                    }
                    break;
            }
        }

       
        $categorias = $this->categoriaService->obtenerCategorias();

         return ['categorias' => $categorias, 'mensaje' => $mensaje];
    }
}
