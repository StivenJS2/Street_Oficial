<?php
class ValoracionService {
    private $urlValoracion = "http://localhost:8080/valoracion";

    
    public function obtenerValoraciones() {
        $respuesta = file_get_contents($this->urlValoracion);
        if ($respuesta === FALSE) {
            return ["success" => false, "error" => "Error al consumir el servicio de valoraciones en $this->urlValoracion"];
        }

        $valoraciones = json_decode($respuesta, true);

        return ["success" => true, "data" => $valoraciones];
    }

    public function eliminarValoracion($id_valoracion) {
        $url = $this->urlValoracion . "/" . $id_valoracion;
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
