<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'residente') {
        die('No tiene permisos para acceder a esta página');
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Residentes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/residentes.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="dashboard">

    <aside class="sidebar">
        <h2>👥 Residentes</h2>
        <nav>
            <ul>
                <li>
                    <a href="#" class="menu" data-opcion="detalle">
                        <i class="fas fa-home"></i> Detalle de inmueble
                    </a>
                </li>

                <li>
                    <a href="#" class="menu" data-opcion="pagos">
                        <i class="fas fa-file-invoice-dollar"></i> Información de pagos
                    </a>
                </li>

                <li>
                    <a href="#" class="menu" data-opcion="config">
                        <i class="fas fa-cog"></i> Configuración
                    </a>
                </li>

                <li>
                    <a href="#" id="logout">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="content">
        <header class="topbar">
            <div class="user-info">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>
                Omar Lopez
            </div>
        </header>

        <h1>Información</h1>

        <div class="info-grid">
            <div class="card">
                <h3>🏠 Detalle de la vivienda</h3><br>
                <p>🔑 Apartamento: 403</p>
                <p>🏢 Torre: 3</p>
                <p>🚗 Parqueadero: 15</p>
            </div>

            <div class="card">
                <h3>✅ Estado de la vivienda</h3><br>
                <div class="estado pagado">Pagado</div><br>
                <div class="fila">
                    <span>📅 Ultimo Pago:</span>
                    <strong>10/03/26</strong>
                </div>

                <div class="fila">
                    <span>💰 Saldo Pendiente:</span>
                    <strong>$0</strong>
                </div>

                <div class="fila">
                    <span>📅 Proximo Pago:</span>
                    <strong>10/04/26</strong>
                </div>
            </div>
        </div>
    </main>

    <script src="js/residentes.js"></script>
</body>
</html>
