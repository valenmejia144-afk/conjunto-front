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
                <li class="menu" data-opcion="viviendas"><i class="fas fa-home"></i> Viviendas</li>
                <li class="menu" data-opcion="parqueaderos"><i class="fas fa-car"></i> Parqueaderos</li>
                <li class="menu" data-opcion="pagos"><i class="fas fa-credit-card"></i> Pagos</li>
                <li class="menu" data-opcion="residentes"><i class="fas fa-users"></i> Residentes</li>
                <li class="menu" data-opcion="logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</li>
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

    <!-- MODAL VIVIENDAS -->
    <div id="modalViviendas" class="modal">
        <div class="modal-content">

            <span class="close" id="cerrarModal">&times;</span>

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

    <!-- MODAL PARQUEADEROS -->
    <div id="modalParqueaderos" class="modal">
        <div class="modal-content">

            <span class="close cerrarModal">&times;</span>

            <h2>Parqueaderos</h2>

            <table>
                <thead>
                    <tr>
                        <th>Residente</th>
                        <th>Torre</th>
                        <th>Apto</th>
                        <th>Parqueadero</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody id="tablaParqueaderos"></tbody>
            </table>

        </div>
    </div>

    <!-- MODAL PAGOS -->
    <div id="modalPagos" class="modal">
        <div class="modal-content">

            <span class="close cerrarModal">&times;</span>

            <h2>Pagos</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Torre</th>
                        <th>Apto</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody id="tablaPagos"></tbody>
            </table>

            <button class="btn-pago">
                Medios de Pago
            </button>

        </div>
    </div>

    <!-- MODAL RESIDENTES -->
    <div id="modalResidentes" class="modal">
        <div class="modal-content">

            <span class="close cerrarModal">&times;</span>

            <h2>Registrar Residente</h2>

            <form id="formResidente">

                <input type="text" placeholder="Nombre" required>
                <input type="text" placeholder="Identificacion" required>
                <input type="email" placeholder="Correo" required>
                <input type="number" placeholder="Torre" required>
                <input type="number" placeholder="Apartamento" required>

                <button type="submit">
                    Registrar
                </button>

            </form>

        </div>
    </div>

    <script src="../js/administrador.js"></script>
</body>
</html>