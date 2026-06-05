<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'admin') {
        die('No tiene permisos para acceder a esta página');
    }

    require_once __DIR__ . '/../includes/api/vivienda.php';
    $response = Vivienda::obtenerTodas();
    $viviendas = $response['data'] ?? [];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viviendas</title>
    <link rel="stylesheet" href="../css/administrador.css">

    <!-- Iconos -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Chart.js para la gráfica -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>🏠 Administrador</h2>
        <nav>
            <ul>
               <li>
                    <a href="viviendas.php">
                        <i class="fas fa-home"></i> Viviendas
                    </a>
                </li>

                <li>
                    <a href="parqueaderos.php">
                        <i class="fas fa-car"></i> Parqueaderos
                    </a>
                </li>

                <li>
                    <a href="pagos.php">
                        <i class="fas fa-car"></i> Pagos
                    </a>
                </li>
                <li>
                    <a href="registroRes.php">
                        <i class="fas fa-car"></i> Residentes
                    </a>
                </li> 
                <li>
                    <a href="../public/principal.php" class="btn-cerrar-sesion">
                        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </a>
                </li>   
            </ul>
            
        </nav>
    </aside>

    <!-- Contenido Principal -->
    <main class="main-content">
        
        <h2>🏠 Viviendas</h2>

        <div class="resumen">
            <div class="card-resumen">
                <h3>🏠 Total</h3>
                <p id="totalViviendas">264</p>
            </div>
            <div class="card-resumen">
                <h3>✅ Al día</h3>
                <p id="viviendasPagadas">234</p>
            </div>
            <div class="card-resumen">
                <h3>❌ Morosas</h3>
                <p id="viviendasMorosas">30</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Apartamento</th>
                    <th>Torre</th>
                    <th>Residente</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="tablaViviendas">
                <?php foreach($viviendas as $vivienda): ?>

                    <tr>
                        <td><?= $vivienda['numero'] ?></td>
                        <td><?= $vivienda['torre'] ?></td>
                        <td><?= $vivienda['residente_id'] ?></td>
                        <td><?= $vivienda['estado'] ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn-volver">
                 Volver 
        </a>
    </main>
    <script src="../js/vivienda.js"></script>
</body>
</html>


