<!-- Modal Pagos -->
<div id="modalPagos" class="modal">

    <div class="modal-content">

        <span class="close" id="cerrarPagos">&times;</span>

        <h2>💳 Gestión de Pagos</h2>

        <div class="resumen">

            <div class="card-resumen">
                <h3>Al Día</h3>
                <p id="alDia">0</p>
            </div>

            <div class="card-resumen">
                <h3>Con Deuda</h3>
                <p id="conDeuda">0</p>
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

            </tbody>

        </table>

        <div class="acciones-pago">

            <button id="btnMediosPago">
                💰 Medios de Pago
            </button>

        </div>

    </div>

</div>