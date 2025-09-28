<?php
require_once __DIR__ . "/../Config/confi.php";

class SesionService {
    private function consumirAPI($url, $correo, $contrasena) {
        $ch = curl_init($url . "/login?correo=" . urlencode($correo) . "&contrasena=" . urlencode($contrasena));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($ch);
        curl_close($ch);

        return json_decode($respuesta, true);
    }

    public function validarUsuario($correo, $contrasena) {
        global $urlCliente, $urlVendedor;

        // Validar Cliente
        $cliente = $this->consumirAPI($urlCliente, $correo, $contrasena);
        if (!empty($cliente)) {
            return "cliente";
        }

        // Validar Vendedor (o Administrador si lo manejas así)
        $admin = $this->consumirAPI($urlVendedor, $correo, $contrasena);
        if (!empty($admin)) {
            return "administrador";
        }

        return null;
    }
}


