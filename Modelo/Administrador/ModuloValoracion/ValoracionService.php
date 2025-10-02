<?php
class ValoracionService {
    private $urlValoracion = "http://localhost:8080/valoracion";
    private $apiToken;

    public function __construct($token) {
        $this->apiToken = $token;
    }

    private function getCurlHeaders() {
        return [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiToken
        ];
    }

    public function obtenerValoraciones() {
        $proceso = curl_init($this->urlValoracion);
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

    public function eliminarValoracion($id_valoracion) {
        $url = $this->urlValoracion . "/" . $id_valoracion;
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