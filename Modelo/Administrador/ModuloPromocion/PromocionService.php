<?php
class PromocionService {
    private $urlPromocion = "http://localhost:8080/promocion";

    public function obtenerPromociones() {
        $respuesta = file_get_contents($this->urlPromocion);
        if ($respuesta === false) {
            return [
                "success" => false,
                "error" => "Error al consumir el servicio de promociones en $this->urlPromocion"
            ];
        }

        $promociones = json_decode($respuesta, true);
        return [
            "success" => true,
            "data" => $promociones
        ];
    }

    
    public function crearPromocion($descripcion, $descuento, $fecha_inicio, $fecha_fin, $id_producto) {
        $datos = [
            "descripcion"   => $descripcion,
            "descuento"     => $descuento,
            "fecha_inicio"  => $fecha_inicio,
            "fecha_fin"     => $fecha_fin,
            "id_producto"   => $id_producto
        ];

        $proceso = curl_init($this->urlPromocion);
        curl_setopt($proceso, CURLOPT_POST, true);
        curl_setopt($proceso, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Content-Length: " . strlen(json_encode($datos))
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

    public function actualizarPromocion($id_promocion, $descripcion, $descuento, $fecha_inicio, $fecha_fin, $id_producto) {
        $datos = [
            "descripcion"   => $descripcion,
            "descuento"     => $descuento,
            "fecha_inicio"  => $fecha_inicio,
            "fecha_fin"     => $fecha_fin,
            "id_producto"   => $id_producto
        ];

        $url = $this->urlPromocion . "/" . $id_promocion;
        $proceso = curl_init($url);
        curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($proceso, CURLOPT_POSTFIELDS, json_encode($datos));
        curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($proceso, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Content-Length: " . strlen(json_encode($datos))
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

    
    public function eliminarPromocion($id_promocion) {
        $url = $this->urlPromocion . "/" . $id_promocion;
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
