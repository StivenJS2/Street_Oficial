<?php
class CategoriaService {
    private $urlCategoria = "http://localhost:8080/categoria";
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


  
    public function obtenerCategorias() {
        $proceso = curl_init($this->urlCategoria);
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, $this->getCurlHeaders());

        $respuesta = curl_exec($proceso);

        if (curl_errno($proceso)) {
            curl_close($proceso);
            return [];
        }

        $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);
        curl_close($proceso);

        if ($http_code === 200) {
            return json_decode($respuesta, true);
        }

        return [];
    }

    public function agregarCategoria($nombre) {
        $datos = [
            "nombre" => $nombre
        ];

        $data_json = json_encode($datos);
        $proceso = curl_init($this->urlCategoria);

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

    public function actualizarCategoria($id, $nombre) {
        $datos = [
            "nombre" => $nombre
        ];

        $data_json = json_encode($datos);
        $url = $this->urlCategoria . "/" . $id;
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

    public function eliminarCategoria($id) {
        $url = $this->urlCategoria . "/" . $id;
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
