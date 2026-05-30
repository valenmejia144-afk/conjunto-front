<?php

    require_once '../includes/auth.php';

    $error = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $login = Auth::login(
            $_POST['email'],
            $_POST['password']
        );

        if ($login['success']) {

            switch(Auth::profile()) {

                case 'admin':
                    header('Location: ../admin/dashboard.php');
                    break;

                case 'residente':
                    header('Location: ../resident/dashboard.php');
                    break;

                case 'seguridad':
                    header('Location: ../security/dashboard.php');
                    break;

                default:
                    header('Location: dashboard.php');
            }

            exit;
        }

        $error = $login['message'];
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servi Conjunto</title>
    <link rel="stylesheet" href="../css/principal.css">
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <!-- Encabezado -->
    <header class="header">
        <div class="login" id="loginBtn">Login</div>
    </header>
    <?php if(!empty($error)): ?>
        <div style="
            color:#721c24;
            background:#f8d7da;
            padding:10px;
            border:1px solid #f5c6cb;
            margin-bottom:15px;
        ">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
    <!-- Contenido principal -->
    <main class="container">
        <h1 class="title">
            Servi<br>Conjunto
        </h1>

        <div class="image-container">
            <img src="../img/Apartamentos_Oqyana.jpg" alt="Apartamentos">
        </div>
    </main>
    <!-- Modal Login -->
     
    <div id="loginModal" class="modal">
        <form method="POST">
            <div class="modal-content">
                <span id="closeModal" class="close">&times;</span>
                
                <h2>Iniciar Sesión</h2>

                <!-- Campos -->
                <input type="text" placeholder="Usuario" name="email">
                <input type="password" placeholder="Contraseña" name="password">

                <!-- Botón -->
                <button id="btnIngresar">Ingresar</button>

                <!-- Registro -->
                <p style="margin-top: 15px; font-size: 14px;">
                    ¿No tienes cuenta? 
                    <a href="registro.html">Regístrate aquí</a>
                </p>
            </div>
        </form>
    </div>

    <script src="../js/principal.js"></script>
</body>
</html>