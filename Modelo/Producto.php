<?php
class Producto {
    private $urlProducto;
    
    public function __construct() {
        global $urlProducto;
        $this->urlProducto = $urlProducto;
    }
    
    //Get
    public function obtenerProductos() {

        $respuesta = file_get_contents($this->urlProducto);

        if ($respuesta === FALSE) return [];

        return json_decode($respuesta, true);

    }
    
    //Post
    public function agregarProducto($nombre, $descripcion, $cantidad, $id_vendedor) {
        $datos = [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "cantidad" => $cantidad,
            "id_vendedor" => $id_vendedor
        ];

        $data_json = json_encode($datos);
        $proceso = curl_init($this->urlProducto);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Content-Length: " . strlen($data_json)
        ]);

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            return ["success" => false, "error" => curl_error($proceso)];
        }

        curl_close($proceso);

        if ($http_code === 200 || $http_code === 201) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } 
        
        else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }
    

    //Put
    public function actualizarProducto($id, $nombre, $descripcion, $cantidad, $id_vendedor) {
        $datos = [
            "id_producto" => $id,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "cantidad" => $cantidad,
            "id_vendedor" => $id_vendedor
        ];

        $data_json = json_encode($datos);
        $proceso = curl_init($this->urlProducto . "/" . $id);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Content-Length: " . strlen($data_json)
        ]);

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            return ["success" => false, "error" => curl_error($proceso)];
        }

        curl_close($proceso);

        if ($http_code === 200) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } 
        
        else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }
    

    //Delete
    public function eliminarProducto($id) {
        $proceso = curl_init($this->urlProducto . "/" . $id);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        if (curl_errno($proceso)) {
            return ["success" => false, "error" => curl_error($proceso)];
        }

        curl_close($proceso);

        if ($http_code === 200 || $http_code === 204) {
            return ["success" => true, "message" => "Producto eliminado correctamente"];
        } 
        
        else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }
    
}
?>