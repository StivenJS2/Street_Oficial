<?php
class PromocionService {
    private $urlPromocion = "http://localhost:8080/promocion";
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

    public function obtenerPromociones() {
        $proceso = curl_init($this->urlPromocion);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders());

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        curl_close($proceso);

        if ($http_code === 200) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }

    public function crearPromocion($descripcion, $descuento, $fecha_inicio, $fecha_fin, $id_producto) {
        $datos = [
            "descripcion"   => $descripcion,
            "descuento"     => $descuento,
            "fecha_inicio"  => $fecha_inicio,
            "fecha_fin"     => $fecha_fin,
            "id_producto"   => $id_producto
        ];
        $data_json = json_encode($datos);

        $proceso = curl_init($this->urlPromocion);
        curl_setopt($proceso, CURLOPT_POST, true);
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders(strlen($data_json)));

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        curl_close($proceso);

        if ($http_code === 200 || $http_code === 201) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }

    public function actualizarPromocion($id_promocion, $descripcion, $descuento, $fecha_inicio, $fecha_fin, $id_producto) {
        $datos = [
            "descripcion"   => $descripcion,
            "descuento"     => $descuento,
            "fecha_inicio"  => $fecha_inicio,
            "fecha_fin"     => $fecha_fin,
            "id_producto"   => $id_producto
        ];
        $data_json = json_encode($datos);
        $url = $this->urlPromocion . "/" . $id_promocion;

        $proceso = curl_init($url);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders(strlen($data_json)));

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        curl_close($proceso);

        if ($http_code === 200) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }

    public function eliminarPromocion($id_promocion) {
        $url = $this->urlPromocion . "/" . $id_promocion;
        $proceso = curl_init($url);

        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders());

        $respuesta = curl_exec($proceso);
        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        curl_close($proceso);

        if ($http_code === 200 || $http_code === 204) {
            return ["success" => true, "data" => json_decode($respuesta, true)];
        } else {
            return ["success" => false, "error" => "HTTP $http_code"];
        }
    }
}
?>