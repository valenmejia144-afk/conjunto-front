document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('morososChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Torre 1', 'Torre 2', 'Torre 3', 'Torre 4', 'Torre 5', 'Torre 6'],
                datasets: [{
                    label: 'Morosos',
                    data: [10, 2, 8, 5, 11, 10],
                    backgroundColor: '#8b0000'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

});

 // ===== CAMPANA =====
    const campana = document.querySelector(".fa-bell");

    if (campana) {
        campana.addEventListener("click", () => {
            alert("No tienes notificaciones 🔔");
        });
    }

document.addEventListener("DOMContentLoaded", function () {

    const menuItems = document.querySelectorAll(".menu");

    menuItems.forEach(item => {
        item.addEventListener("click", function () {

            const opcion = this.dataset.opcion;

            if (opcion === "dashboard") {
                alert("Estás en Dashboard 📊");
            }

            if (opcion === "viviendas") {
                alert("Módulo de Viviendas 🏠");
            }

            if (opcion === "parqueaderos") {
                alert("Módulo de Parqueaderos 🚗");
            }

            if (opcion === "pagos") {
                alert("Módulo de Pagos 💰");
            }

            if (opcion === "reportes") {
                alert("Módulo de Reportes 📄");
            }

            if (opcion === "residentes") {
                alert("Módulo de Residentes 👥");
            }

            if (opcion === "config") {
                alert("Configuración ⚙️");
            }

            if (opcion === "logout") {
                const confirmar = confirm("¿Cerrar sesión?");
                if (confirmar) {
                    alert("Sesión cerrada 👋");
                }
            }

        });
    });

});