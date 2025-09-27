<?php
require_once __DIR__ . "/../../Config/Conexion.php";

class LoginService {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConexion();
    }

    public function validarUsuario($correo, $password) {
        // Primero buscar en Cliente
        $queryCliente = "SELECT idCliente AS id, correo, password, 'cliente' AS rol 
                         FROM Cliente WHERE correo = :correo";
        $stmt = $this->conexion->prepare($queryCliente);
        $stmt->bindParam(":correo", $correo);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente && hash('sha256', $password) === $cliente['password']) {
            return $cliente;
        }

        // Luego buscar en Vendedor
        $queryVendedor = "SELECT idVendedor AS id, correo, password, 'vendedor' AS rol 
                          FROM Vendedor WHERE correo = :correo";
        $stmt = $this->conexion->prepare($queryVendedor);
        $stmt->bindParam(":correo", $correo);
        $stmt->execute();
        $vendedor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($vendedor && hash('sha256', $password) === $vendedor['password']) {
            return $vendedor;
        }

        return false;
    }
}
?>
