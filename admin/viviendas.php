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
            </ul>
            
        </nav>
    </aside>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div id="modalViviendas" class="modal">
            <div class="modal-content">

                <a href="dashboard.php" class="btn-volver">
                    ← Volver al Dashboard
                </a>

                <h2>Gestión de Viviendas</h2>

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
                        </tr>
                    </thead>

                    <tbody id="tablaViviendas">
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <script src="../js/administrador.js"></script>
</body>
</html>


