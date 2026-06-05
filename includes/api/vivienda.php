<?php

require_once __DIR__ . '/../../config/api.php';

class Vivienda
{
    public static function obtenerTodas()
    {
        $url = API_URL . '/vivienda';

        $token = $_SESSION['token'];

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ]
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
    
        return json_decode($response, true);
    }

    public static function obtenerPorId($id)
    {
        $url = API_URL . '/viviendas/' . $id;

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}