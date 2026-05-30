<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'seguridad') {
        die('No tiene permisos para acceder a esta página');
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Viviendas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/vivienda.css">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="dashboard">

    <aside class="sidebar">
        <h2>👮 Seguridad</h2>
        <ul>
            <li><i class="fas fa-arrow-right"></i> Entradas/Salidas</a></li>
            <li><i class="fas fa-users"></i> Visitas</a></li>
            <li><i class="fas fa-cog"></i> Configuración</a></li>
            <li><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
        </ul>
    </aside>

    <main class="content">
        <header class="topbar">
            <div class="user-info">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>
                Fredy Ospina
            </div>
        </header>

        <section class="cards">
                <!-- Card 1 -->
                <div class="card">
                    <h4>🔑 Apartamento: 503</h4><br>
                    <p>🏢 Torre: 6</p><br>
                    <p>🚗 Parqueadero: 9</p>
                    <div class="estado mora">Mora</div>
                </div>

                <!-- Card 2 -->
                <div class="card active">
                    <h4>🔑 Apartamento: 101</h4><br>
                    <p>🏢 Torre: 10</p><br>
                    <p>🚗 Parqueadero: 80</p>
                    <div class="estado pendiente">Pendiente</div>
                </div>
                
                <div class="card ">
                    <h4>🔑 Apartamento: 802</h4><br>
                    <p>🏢 Torre: 3</p><br>
                    <p>🚗 Parqueadero: 20</p>
                    <div class="estado pagado">Pagado</div>
                </div>
        </section>
    </main>
    
    <script src="js/vivienda.js"></script>
</body>
</html>