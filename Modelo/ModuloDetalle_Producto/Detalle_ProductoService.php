<?php
class DetalleProductoService {
    private $urlDetalleProducto = "http://localhost:8080/detalle_producto";

    // Obtener todos los detalles de producto
    public function obtenerDetalles() {
        $respuesta = file_get_contents($this->urlDetalleProducto);
        if ($respuesta === FALSE) return [];

        return json_decode($respuesta, true);
    }

    // Agregar un nuevo detalle de producto
    public function agregarDetalle($talla, $color, $imagen, $id_producto, $id_categoria, $precio) {
        $datos = [
            "talla" => $talla,
            "color" => $color,
            "imagen" => $imagen,
            "id_producto" => $id_producto,
            "id_categoria" => $id_categoria,
            "precio" => $precio
        ];

        $data_json = json_encode($datos);
        $proceso = curl_init($this->urlDetalleProducto);

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
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }

    // Actualizar un detalle de producto
    public function actualizarDetalle($id, $talla, $color, $imagen, $id_producto, $id_categoria, $precio) {
        $datos = [
            "talla" => $talla,
            "color" => $color,
            "imagen" => $imagen,
            "id_producto" => $id_producto,
            "id_categoria" => $id_categoria,
            "precio" => $precio
        ];

        $data_json = json_encode($datos);
        $url = $this->urlDetalleProducto . "/" . $id;
        $proceso = curl_init($url);

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
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }

    // Eliminar un detalle de producto
    public function eliminarDetalle($id) {
        $url = $this->urlDetalleProducto . "/" . $id;
        $proceso = curl_init($url);

        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            return ["success" => false, "error" => curl_error($proceso)];
        }

        curl_close($proceso);

        if ($http_code === 200 || $http_code === 204) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }
}
?>
