<?php
// Modelo/Login/LoginService.php

class LoginService {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function autenticar($correo, $contrasena) {
        $cliente = $this->buscarCliente($correo, $contrasena);
        if ($cliente) {
            return [
                'tipo' => 'cliente',
                'datos' => $cliente
            ];
        }

        $vendedor = $this->buscarVendedor($correo, $contrasena);
        if ($vendedor) {
            return [
                'tipo' => 'administrador',
                'datos' => $vendedor
            ];
        }

        return null;
    }

    private function buscarCliente($correo, $contrasena) {
        $query = "SELECT * FROM cliente WHERE correo_electronico = ? AND contrasena = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$correo, $contrasena]);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado : null;
    }

    private function buscarVendedor($correo, $contrasena) {
        $query = "SELECT * FROM vendedor WHERE correo_electronico = ? AND contrasena = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$correo, $contrasena]);
        
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado : null;
    }
}
?>