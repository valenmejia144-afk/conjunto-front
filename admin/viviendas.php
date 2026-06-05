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

/* ELIMINAR */
if (isset($_GET['eliminar'])) {

    $respuesta = Vivienda::eliminar($_GET['eliminar']);

    if (!empty($respuesta['ok'])) {

        header('Location: viviendas.php?eliminado=1');
        exit;
    }
}

/* EDITAR */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {

    $respuesta = Vivienda::actualizar($_POST['id'], [
        'numero' => $_POST['numero'],
        'torre'  => $_POST['torre'],
        'estado' => $_POST['estado']
    ]);

    if (!empty($respuesta['ok'])) {
        header('Location: viviendas.php?actualizado=1');
        exit;
    }
}

    $viviendaEditar = null;

    if (isset($_GET['editar'])) {

        $respuesta = Vivienda::obtenerPorId($_GET['editar']);

        if (!empty($respuesta['ok'])) {
            $viviendaEditar = $respuesta['data'];
        }
    }

    /* LISTAR */
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
    <main class="main-content">

        <h2>🏠 Viviendas</h2>

        <?php if (!empty($viviendaEditar)): ?>

            <div class="card-formulario">

                <h3>Editar Vivienda</h3>

                <form method="POST">

                    <input type="hidden"
                        name="id"
                        value="<?= $viviendaEditar['id'] ?>">

                    <div class="campo">
                        <label>Apartamento</label>
                        <input type="text"
                            name="numero"
                            value="<?= $viviendaEditar['numero'] ?>"
                            required>
                    </div>

                    <div class="campo">
                        <label>Torre</label>
                        <input type="text"
                            name="torre"
                            value="<?= $viviendaEditar['torre'] ?>"
                            required>
                    </div>

                    <div class="campo">
                        <label>Estado</label>

                        <select name="estado">

                            <option value="Al día"
                                <?= $viviendaEditar['estado'] == 'Al día' ? 'selected' : '' ?>>
                                Al día
                            </option>

                            <option value="Moroso"
                                <?= $viviendaEditar['estado'] == 'Moroso' ? 'selected' : '' ?>>
                                Moroso
                            </option>

                        </select>
                    </div>

                    <button type="submit"
                        name="actualizar"
                        class="btn-guardar">
                        Guardar cambios
                    </button>

                </form>

            </div>

            <br>

        <?php endif; ?>

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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaViviendas">
                <?php foreach ($viviendas as $vivienda): ?>

                    <tr>
                        <td><?= $vivienda['numero'] ?></td>
                        <td><?= $vivienda['torre'] ?></td>
                        <td><?= $vivienda['residente'] ?></td>
                        <td><?= $vivienda['estado'] ?></td>

                        <td>
                            <a href="viviendas.php?editar=<?= $vivienda['id'] ?>" class="btn-editar">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="viviendas.php?eliminar=<?= $vivienda['id'] ?>"
                                class="btn-eliminar">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>

        <a href="dashboard.php" class="btn-volver">
            Volver
        </a>
    </main>
    <?php if (isset($_GET['eliminado'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registro eliminado',
                text: 'La vivienda fue eliminada correctamente',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>


    <?php if (isset($_GET['actualizado'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Actualizado',
                text: 'La vivienda fue actualizada correctamente',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>
</body>
</html>