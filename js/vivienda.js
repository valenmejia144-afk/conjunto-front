document.addEventListener("DOMContentLoaded", function () {

    // ===== 1. SELECCIONAR TARJETAS =====
    const cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        card.addEventListener("click", () => {

            // Quitar selección anterior
            cards.forEach(c => c.classList.remove("active"));

            // Activar la actual
            card.classList.add("active");
        });
    });

    // ===== 2. CAMBIAR ESTADOS AUTOMÁTICOS =====
    const estados = document.querySelectorAll(".estado");

    estados.forEach(estado => {

        const texto = estado.textContent.trim().toLowerCase();

        if (texto === "pagado") {
            estado.style.backgroundColor = "green";
            estado.style.color = "white";
        } 
        else if (texto === "pendiente") {
            estado.style.backgroundColor = "orange";
            estado.style.color = "black";
        } 
        else if (texto === "mora") {
            estado.style.backgroundColor = "red";
            estado.style.color = "white";
        }
    });

    // ===== 3. MENÚ LATERAL =====
    const menuItems = document.querySelectorAll(".sidebar ul li");

    menuItems.forEach((item, index) => {
        item.addEventListener("click", () => {

            switch (index) {
                case 0:
                    alert("Entradas y Salidas");
                    break;
                case 1:
                    alert("Visitas");
                    break;
                case 2:
                    alert("Configuración");
                    break;
                case 3:
                    cerrarSesion();
                    break;
            }

        });
    });

    // ===== 4. NOTIFICACIONES =====
    const campana = document.querySelector(".fa-bell");

    if (campana) {
        campana.addEventListener("click", () => {
            alert("No hay novedades de seguridad 🔔");
        });
    }

    // ===== 5. CERRAR SESIÓN =====
    function cerrarSesion() {
        const confirmar = confirm("¿Deseas cerrar sesión?");
        if (confirmar) {
            window.location.href = "index.html";
        }
    }

});