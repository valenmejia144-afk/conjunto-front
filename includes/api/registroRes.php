<?php

require_once __DIR__ . '/../../config/api.php';

class Registro
{
    public static function crear($datos)
    {
        $url = API_URL . '/api/registro';

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => json_encode($datos)
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return [
                'ok' => false,
                'mensaje' => curl_error($ch)
            ];
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}