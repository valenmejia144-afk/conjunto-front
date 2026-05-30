<?php

session_start();

require_once __DIR__ . '/../config/api.php';

class Auth
{
    public static function login($email, $password)
    {
        $url = API_URL . '/auth/login';

        $data = [
            'email' => $email,
            'password' => $password
        ];

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
            CURLOPT_POSTFIELDS => json_encode($data)
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if(isset($result['token'])) {

            $_SESSION['token'] = $result['token'];
            $_SESSION['profile'] = $result['profile'];

            return [
                'success' => true
            ];
        }

        return [
            'success' => false,
            'message' => $result['error'] ?? 'Correo o contraseña incorrectos'
        ];
    }

    public static function check()
    {
        return isset($_SESSION['token']);
    }

    public static function token()
    {
        return $_SESSION['token'] ?? null;
    }

    public static function profile()
    {
        return $_SESSION['profile'] ?? null;
    }

}