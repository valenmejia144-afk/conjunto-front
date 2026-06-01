<head>
    <link rel="stylesheet" href="../css/viviendas.css">
</head>

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