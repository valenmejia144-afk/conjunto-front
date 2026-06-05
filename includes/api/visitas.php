<?php

require_once __DIR__ . '/../../config/api.php';

class Visita
{
    public static function registrar($datos)
    {
        $url = API_URL . '/api/visitas';

        $token = $_SESSION['token'] ?? '';

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ],
            CURLOPT_POSTFIELDS => json_encode($datos)
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }

    public static function obtenerTodas()
    {
        $url = API_URL . '/visitas';

        $token = $_SESSION['token'] ?? '';

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
