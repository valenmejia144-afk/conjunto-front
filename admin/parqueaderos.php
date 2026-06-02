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
            </ul>
            
        </nav>
    </aside>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div id="modalParqueaderos" class="modal">
            <div class="modal-content">

                <span class="close" id="cerrarParqueaderos">&times;</span>

                <h2>🚗 Gestión de Parqueaderos</h2>

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

                    </tbody>

                </table>

            </div>
        </div>
    </main>

    <script src="../js/administrador.js"></script>
</body>
</html>
<!-- Modal Parqueaderos -->
