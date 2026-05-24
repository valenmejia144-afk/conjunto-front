document.addEventListener("DOMContentLoaded", function () {

    // ===== LOGOUT =====
    const logout = document.getElementById("logout");

    if (logout) {
        logout.addEventListener("click", function(e) {
            e.preventDefault();

            const confirmar = confirm("¿Deseas cerrar sesión?");
            
            if (confirmar) {
                alert("Sesión cerrada 👋");
                // Aquí luego puedes redirigir
                // window.location.href = "index.html";
            }
        });
    }

    // ===== ESTADO DE PAGO =====
    const estado = document.querySelector(".estado");
    const filas = document.querySelectorAll(".fila strong");

    if (estado && filas.length > 1) {

        const saldoTexto = filas[1].textContent.trim();

        if (saldoTexto === "$0") {
            estado.textContent = "Pagado";
            estado.style.backgroundColor = "green";
            estado.style.color = "white";
        } else {
            estado.textContent = "Pendiente";
            estado.style.backgroundColor = "red";
            estado.style.color = "white";
        }
    }

    // ===== CAMPANA =====
    const campana = document.querySelector(".fa-bell");

    if (campana) {
        campana.addEventListener("click", () => {
            alert("No tienes notificaciones 🔔");
        });
    }
    // ===== MENU FUNCIONAL =====
    const menu = document.querySelectorAll(".menu");

    menu.forEach(item => {
        item.addEventListener("click", function(e) {
            e.preventDefault();

            const opcion = this.dataset.opcion;

            if (opcion === "detalle") {
                alert("Estás en Detalle de inmueble 🏠");
            }

            if (opcion === "pagos") {
                alert("Aquí irá la pantalla de Pagos 💰");
            }

            if (opcion === "config") {
                alert("Configuración ⚙️");
            }
        });
    });

});