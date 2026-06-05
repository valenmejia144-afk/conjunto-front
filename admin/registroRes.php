<?php
    session_start();

    if (!isset($_SESSION['token'])) {
        header('Location: login.php');
        exit;
    }

    if ($_SESSION['profile'] !== 'admin') {
        die('No tiene permisos para acceder a esta página');
    }

    require_once __DIR__ . '/../includes/api/registroRes.php';

    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $respuesta = Registro::crear([
            'nombre' => $_POST['nombre'],
            'identificacion' => $_POST['identificacion'],
            'correo' => $_POST['correo'],
            'torre' => $_POST['torre'],
            'numero' => $_POST['numero']
        ]);

        if (!empty($respuesta['ok'])) {

            $mensaje = "Residente registrado correctamente";

        } else {

            $mensaje = $respuesta['mensaje'] ?? 'Error al registrar';

        }
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
   <div class="card-formulario">

        <h2>Registro de Residente</h2>
        <p>Complete la información del residente</p>

        <form class="formulario" method="POST">

           <div class="campo">
                <label>Nombre Completo</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="campo">
                <label>Identificación</label>
                <input type="text" name="identificacion" required>
            </div>


            <div class="campo">
                <label>Correo Electrónico</label>
                <input type="email" name="correo" required>
            </div>

            <div class="fila">

                <div class="campo">
                    <label>Torre</label>
                    <input type="number" name="torre" required>
                </div>

                <div class="campo">
                    <label>Apartamento</label>
                    <input type="text" name="numero" required>
                </div>

            </div>

            <div class="botones">

                <button type="submit" class="btn-guardar">
                    <i class="fas fa-save"></i> Guardar
                </button>

                <a href="dashboard.php" class="btn-volver">
                      Volver 
                </a>
            </div>

        </form>
    </div>

    <script src="../js/administrador.js"></script>

    <?php if (!empty($respuesta['ok'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Registro exitoso!',
                text: 'Residente registrado correctamente',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#28a745'
            });
        </script>
    <?php endif; ?>

</body>
</html>

