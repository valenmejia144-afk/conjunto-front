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
        <form action="" method="post">

            <input
                type="text"
                name="nombre"
                placeholder="Nombre"
                required>

            <input
                type="text"
                name="identificacion"
                placeholder="Identificación"
                required>

            <input
                type="email"
                name="correo"
                placeholder="Correo"
                required>

            <input
                type="number"
                name="torre"
                placeholder="Torre"
                required>

            <input
                type="text"
                name="apartamento"
                placeholder="Apartamento"
                required>

            <button type="submit">
                Guardar
            </button>

            
        </form>
    </main>

    <script src="../js/administrador.js"></script>
</body>
</html>

