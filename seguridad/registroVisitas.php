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

    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $respuesta = Visita::registrar([

            'nombre_visita' => $_POST['nombre_visita'],
            'identificacion' => $_POST['identificacion'],
            'placa' => $_POST['placa'],
            'torre' => $_POST['torre'],
            'apartamento' => $_POST['apartamento'],
            'residente' => $_POST['residente'],
            'fecha' => $_POST['fecha'],
            'hora_ingreso' => $_POST['hora_ingreso'],
            'observaciones' => $_POST['observaciones']

        ]);

        if ($respuesta && $respuesta['ok']) {

            $mensaje = 'Visita registrada correctamente';

        } else {

            $mensaje = $respuesta['mensaje'] ?? 'Error al registrar visita';

        }
    }

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <h2>Registro de Visitas</h2>
            <p>Ingrese la información de la visita</p>

            <form class="formulario" method="POST">

                <div class="campo">
                    <label>Nombre Completo</label>
                    <input type="text" name="nombre_visita" required>
                </div>

                <div class="campo">
                    <label>Identificación</label>
                    <input type="text" name="identificacion" required>
                </div>

                <div class="campo">
                    <label>Placa Vehículo (Opcional)</label>
                    <input type="text" name="placa">
                </div>

                <div class="fila">

                    <div class="campo">
                        <label>Torre</label>
                        <input type="number" name="torre" required>
                    </div>

                    <div class="campo">
                        <label>Apartamento</label>
                        <input type="number" name="apartamento" required>
                    </div>

                </div>

                <div class="campo">
                    <label>Residente que Autoriza</label>
                    <input type="text" name="residente" required>
                </div>

                <div class="fila">

                    <div class="campo">
                        <label>Fecha</label>
                        <input type="date" name="fecha" required>
                    </div>

                    <div class="campo">
                        <label>Hora Ingreso</label>
                        <input type="time" name="hora_ingreso" required>
                    </div>

                </div>

                <div class="campo">
                    <label>Observaciones</label>
                    <textarea name="observaciones" rows="4"></textarea>
                </div>

                <div class="botones">

                    <button type="submit" class="btn-guardar">
                        <i class="fas fa-save"></i> Registrar Visita
                    </button>

                    <a href="dashboard.php" class="btn-volver">
                        Volver 
                    </a>

                </div>

            </form>
        </div>
    </main>
    <script src="../js/seguridad.js"></script>

    <?php if (!empty($respuesta['ok'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Visita registrada!',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#28a745'
            });
        </script>
    <?php endif; ?>
</body>
</html>