<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'admin') {
        die('No tiene permisos para acceder a esta página');
    }
    
    require_once __DIR__ . '/../includes/api/parqueaderos.php';

    $response = Parqueadero::obtenerTodos();

    $parqueaderos = $response['data'] ?? [];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
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
        
        <h2>🚗 Parqueaderos</h2>
        <div class="resumen">
            <div class="card-resumen">
                <h3>Total</h3>
                <p id="totalParqueaderos">0</p>
            </div>
            <div class="card-resumen">
                <h3>Ocupados</h3>
                <p id="ocupados">0</p>
            </div>
            <div class="card-resumen">
                <h3>Libres</h3>
                <p id="libres">0</p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Parqueadero</th>
                    <th>Torre</th>
                    <th>Apartamento</th>
                    <th>Residente</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="tablaParqueaderos">
                <?php foreach($parqueaderos as $p): ?>

                    <tr>
                        <td><?= $p['parqueadero'] ?></td>
                        <td><?= $p['torre'] ?></td>
                        <td><?= $p['apartamento'] ?></td>
                        <td><?= $p['residente'] ?? 'Sin asignar' ?></td>
                        <td><?= $p['estado'] ?></td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>

        <a href="dashboard.php" class="btn-volver">
                 Volver 
        </a>

    </main>

    <script src="../js/parqueaderos.js"></script>
</body>
</html>

