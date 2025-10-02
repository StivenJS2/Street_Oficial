<?php
require_once __DIR__ . "/../../Modelo/Administrador/ModuloCliente/ClienteService.php";

class ClienteController {
    private $clienteService;

    public function __construct() {
        session_start();

        if (!isset($_SESSION['token'])) {
            die("Acceso denegado. Se requiere autenticación.");
        }

        $this->clienteService = new ClienteService($_SESSION['token']);
    }

    public function manejarPeticion() {
        $mensaje = "";
        $clientes = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accion = $_POST["_action"] ?? "";

            switch ($accion) {
                case "agregar":
                    $nombre = trim($_POST['nombre'] ?? '');
                    $apellido = trim($_POST['apellido'] ?? '');
                    $contrasena = trim($_POST['contrasena'] ?? '');
                    $direccion = trim($_POST['direccion'] ?? '');
                    $telefono = trim($_POST['telefono'] ?? '');
                    $correo_electronico = trim($_POST['correo_electronico'] ?? '');

                    if ($nombre && $apellido && $contrasena && $direccion && $telefono && $correo_electronico) {
                        $resultado = $this->clienteService->agregarCliente(
                            $nombre, $apellido, $contrasena, $direccion, $telefono, $correo_electronico
                        );

                        if (!empty($resultado) && isset($resultado["success"]) && $resultado["success"]) {
                            $mensaje = "<div class='alert alert-success'>Cliente agregado correctamente.</div>";
                        } else {
                            $err = $resultado["error"] ?? "Error desconocido";
                            $mensaje = "<div class='alert alert-danger'>Error: {$err}</div>";
                        }
                    } else {
                        $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
                    }
                    break;

                case "actualizar":
                    $id = $_POST["id_cliente"] ?? null;
                    $nombre = trim($_POST['nombre'] ?? '');
                    $apellido = trim($_POST['apellido'] ?? '');
                    $contrasena = trim($_POST['contrasena'] ?? '');
                    $direccion = trim($_POST['direccion'] ?? '');
                    $telefono = trim($_POST['telefono'] ?? '');
                    $correo_electronico = trim($_POST['correo_electronico'] ?? '');

                    if ($id && $nombre && $apellido && $contrasena && $direccion && $telefono && $correo_electronico) {
                        $resultado = $this->clienteService->actualizarCliente(
                            $id, $nombre, $apellido, $contrasena, $direccion, $telefono, $correo_electronico
                        );
                        if (!empty($resultado) && isset($resultado["success"]) && $resultado["success"]) {
                            $mensaje = "<div class='alert alert-success'>Cliente actualizado correctamente.</div>";
                        } else {
                            $err = $resultado["error"] ?? "Error desconocido";
                            $mensaje = "<div class='alert alert-danger'>Error: {$err}</div>";
                        }
                    } else {
                        $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
                    }
                    break;

                case "eliminar":
                    $id = $_POST["id_cliente"] ?? null;

                    if ($id) {
                        $resultado = $this->clienteService->eliminarCliente($id);
                        if (!empty($resultado) && isset($resultado["success"]) && $resultado["success"]) {
                            $mensaje = "<div class='alert alert-success'>Cliente eliminado correctamente.</div>";
                        } else {
                            $err = $resultado["error"] ?? "Error desconocido";
                            $mensaje = "<div class='alert alert-danger'>Error: {$err}</div>";
                        }
                    } else {
                        $mensaje = "<div class='alert alert-danger'>El ID del cliente es obligatorio.</div>";
                    }
                    break;
            }
        }

        // Traer los clientes (si no hay filas, se espera un array vacío)
        $clientes = $this->clienteService->obtenerClientes();
        

        return ['clientes' => $clientes, 'mensaje' => $mensaje];

    }
}
