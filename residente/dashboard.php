<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'residente') {
        die('No tiene permisos para acceder a esta página');
    }

    require_once __DIR__ . '/../includes/api/residente.php';

    $response = Residente::obtenerPerfil();

    $datos = $response['data'] ?? [];
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Residentes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/residentes.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="dashboard">

    <main class="content">
        <header class="topbar">
            <div class="user-info">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>
                Omar Lopez
            </div>
        </header>

        <h2>👥 Residentes</h2>
        <br>
        <h1>Información</h1>

        <div class="info-grid">
            <div class="card">
                <h3>🏠 Detalle de la vivienda</h3><br>
                <p>🔑 Apartamento: <?= $datos['apartamento'] ?? '' ?></p>
                <p>🏢 Torre:<?= $datos['torre'] ?? '' ?></p>
                <p>🚗 Parqueadero: <?= $datos['parqueadero'] ?? 'No asignado' ?></p>
            </div>

            <div class="card">
                <h3>✅ Estado de la vivienda</h3><br>
                <div class="estado pagado"><?= $datos['estado'] ?? 'Sin información' ?></div><br>
                <div class="fila">
                    <span>📅 Ultimo Pago:</span>
                    <strong><?= $datos['ultimo_pago'] ?? 'Sin pagos registrados' ?></strong>
                </div>

                <div class="fila">
                    <span>💰 Saldo Pendiente:</span>
                    <strong>$<?= number_format($datos['saldo_pendiente'] ?? 0, 0, ',', '.') ?></strong>
                </div>

                <div class="fila">
                    <span>📅 Proximo Pago:</span>
                    <strong><?= $datos['proximo_pago'] ?? 'Sin información' ?></strong>
                </div>
            </div>
        </div>
        <br>
        <a href="../public/principal.php" class="btn-cerrar-sesion">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </a>  
    </main>

    <script src="../js/residentes.js"></script>
</body>
</html>
