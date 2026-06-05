<?php

require_once __DIR__ . '/../../config/api.php';

class Pago
{
    public static function obtenerTodos()
    {
        $url = API_URL . '/pagos';

        $token = $_SESSION['token'];

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ]
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }
}