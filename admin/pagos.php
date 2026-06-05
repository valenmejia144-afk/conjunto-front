<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'admin') {
        die('No tiene permisos para acceder a esta página');
    }

    require_once __DIR__ . '/../includes/api/pagos.php';

    $response = Pago::obtenerTodos();

    $pagos = $response['data'] ?? [];

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
                        <i class="fa fa-credit-card-alt"></i> Pagos
                    </a>
                </li>
                <li>
                    <a href="registroRes.php">
                        <i class="fa fa-users"></i> Residentes
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
        
        <h2>💳 Pagos</h2>
            <div class="resumen">
                <div class="card-resumen">
                    <h3>Al Día</h3>
                    <p id="alDia">144</p>
                </div>
                <div class="card-resumen">
                    <h3>Con Deuda</h3>
                    <p id="conDeuda">120</p>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Apartamento</th>
                        <th>Torre</th>
                        <th>Valor</th>
                        <th>Fecha pago</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody id="tablaPagos">
                    <?php foreach($pagos as $pago): ?>
                    
                        <tr>
                            <td><?= $pago['apartamento'] ?></td>
                            <td><?= $pago['torre'] ?></td>
                            <td>$<?= number_format($pago['valor'], 0, ',', '.') ?></td>
                            <td><?= $pago['fecha_pago'] ?></td>
                            <td><?= $pago['estado'] ?></td>
                        </tr>
                    
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <a href="dashboard.php" class="btn-volver">
                 Volver 
            </a>
    </main>

    <script src="../js/pagos.js"></script>
</body>
</html>

