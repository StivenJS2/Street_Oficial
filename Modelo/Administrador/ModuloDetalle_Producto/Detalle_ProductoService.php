<?php
class DetalleProductoService {
    private $urlDetalleProducto = "http://localhost:8080/detalle_producto";
    private $apiToken;

    public function __construct($token) {
        $this->apiToken = $token;
    }

    private function getCurlHeaders($contentLength = 0) {
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiToken
        ];
        if ($contentLength > 0) {
            $headers[] = 'Content-Length: ' . $contentLength;
        }
        return $headers;
    }

    public function obtenerDetalles() {
        $proceso = curl_init($this->urlDetalleProducto);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders());

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

        if (curl_errno($proceso)) {
            curl_close($proceso);
            return [];
        }

        curl_close($proceso);

        if ($http_code == 200) {
            return json_decode($respuesta, true);
        } else {
            // En un entorno de producción, sería bueno registrar el error.
            // error_log("Error al obtener detalles: HTTP $http_code");
            return [];
        }
    }

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
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders(strlen($data_json)));

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
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders(strlen($data_json)));

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

    
    public function eliminarDetalle($id) {
        $url = $this->urlDetalleProducto . "/" . $id;
        $proceso = curl_init($url);

        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders());

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