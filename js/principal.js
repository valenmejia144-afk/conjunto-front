// Obtener elementos
const loginBtn = document.getElementById("loginBtn");
const modal = document.getElementById("loginModal");
const closeModal = document.getElementById("closeModal");

// Abrir modal
loginBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

// Cerrar modal con la X
closeModal.addEventListener("click", () => {
    modal.style.display = "none";
});

// Cerrar modal al hacer clic fuera
window.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
    }
});

if (loginBtn && modal && closeModal) {

    loginBtn.addEventListener("click", () => {
        modal.style.display = "block";
    });

    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

}
const btnIngresar = document.getElementById("btnIngresar");
btnIngresar.addEventListener("click", () => {
    const tipo = document.getElementById("tipoUsuario").value;

    if (!tipo) {
        alert("Selecciona un tipo de usuario");
        return;
    }

    console.log("Tipo de usuario:", tipo);
});

if (tipo === "admin") {
    window.location.href = "admin.html";
} else if (tipo === "residente") {
    window.location.href = "residente.html";
} else if (tipo === "seguridad") {
    window.location.href = "seguridad.html";
}