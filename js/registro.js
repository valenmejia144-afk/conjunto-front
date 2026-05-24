document.getElementById("registroForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("http://localhost/serviconjunto/api/registro.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.mensaje) {
            alert("Usuario registrado ✅");
            window.location.href = "principal.html";
        } else {
            alert("Error al registrar ❌");
        }
    });
});