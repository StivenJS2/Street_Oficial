<?php
class Conectar {
    
    public static function conexion() {
        $host = 'localhost';
        $dbname = 'street1';
        $usuario = 'root';
        $contrasena = '12345678';

        try {
            $conexion = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {

            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>