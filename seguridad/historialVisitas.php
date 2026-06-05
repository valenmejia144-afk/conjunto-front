<?php
session_start();

if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['profile'] !== 'seguridad') {
    die('No tiene permisos para acceder a esta página');
}

require_once __DIR__ . '/../includes/api/visitas.php';

$respuesta = Visita::obtenerTodas();

$visitas = $respuesta['data'] ?? [];


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Viviendas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/seguridad.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="dashboard">

    <aside class="sidebar">
        <h2>👮 Seguridad</h2>
        <ul>
            <li>
                <a href="registroVisitas.php">
                    <i class="fas fa-users"></i> Visitas
                </a>

            </li>
            <li>
                <a href="historialVisitas.php">
                    <i class="fas fa-clock"></i> Historial
                </a>

            </li>
            <li>
                <a href="../public/principal.php" class="btn-cerrar-sesion">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </li>
        </ul>
    </aside>

    <main class="main-content">

        <div class="card-formulario">

            <h2>
                <i class="fas fa-history"></i>
                Historial de Visitas
            </h2>

            <table>

                <thead>
                    <tr>
                        <th>Visitante</th>
                        <th>Identificación</th>
                        <th>Placa</th>
                        <th>Torre</th>
                        <th>Apartamento</th>
                        <th>Residente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($visitas as $visita): ?>
                    
                    <tr>
                        <td><?= $visita['nombre_visita'] ?></td>
                        <td><?= $visita['identificacion'] ?></td>
                        <td><?= $visita['placa'] ?></td>
                        <td><?= $visita['torre'] ?></td>
                        <td><?= $visita['apartamento'] ?></td>
                        <td><?= $visita['residente'] ?></td>
                        <td><?= $visita['fecha'] ?></td>
                        <td><?= $visita['hora_ingreso'] ?></td>
                        <td><?= $visita['observaciones'] ?></td>
                    </tr>
                    
                    <?php endforeach; ?>
                
                </tbody>

            </table>

        </div>

    </main>

</body>

</html>