<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'admin') {
        die('No tiene permisos para acceder a esta página');
    }
    
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

        <!-- Barra Superior -->
        <header class="topbar">
            <div></div>
            <div class="user-info">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user-circle"></i>
                <span>Adriana Gomez</span>
            </div>
        </header>

        <!-- Tarjetas -->
        <section class="cards">
            <div class="card">
                <h3>🏠 Viviendas</h3>
                <p class="number">264</p>
                <span>Registrados</span>
            </div>

            <div class="card active">
                <h3>🚗 Parqueaderos</h3>
                <p class="number">100</p>
                <span>Disponibles</span>
            </div>

            <div class="card">
                <h3>✅ Pagos</h3>
                <p class="number">$1,200,000</p>
                <span>Recibidos este mes</span>
            </div>
        </section>

        <!-- Gráfica -->
        <section class="chart-section">
            <div class="chart-header">
                <div>
                    <h2>Viviendas Morosas</h2>
                    <p><strong>30</strong> viviendas con deuda activa</p>
                </div>
                <div class="legend">
                    <span class="legend-color"></span> Morosos
                </div>
            </div>
            <canvas id="morososChart"></canvas>
        </section>

    </main>

    <script src="../js/administrador.js"></script>
</body>
</html>