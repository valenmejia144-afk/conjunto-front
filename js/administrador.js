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

// MENU

document.addEventListener("DOMContentLoaded", () => {

    const menus = document.querySelectorAll(".menu");

    menus.forEach(menu => {

        menu.addEventListener("click", () => {

            const opcion = menu.dataset.opcion;

            switch(opcion){

                case "viviendas":
                    document.getElementById("modalViviendas").style.display = "flex";
                    cargarViviendas();
                    break;

                case "parqueaderos":
                    document.getElementById("modalParqueaderos").style.display = "flex";
                    cargarParqueaderos();
                    break;

                case "pagos":
                    document.getElementById("modalPagos").style.display = "flex";
                    cargarPagos();
                    break;

                case "residentes":
                    document.getElementById("modalResidentes").style.display = "flex";
                    break;

                case "logout":

                    if(confirm("¿Desea cerrar sesión?")){
                        window.location.href = "principal.php";
                    }

                    break;
            }

        });

    });

});