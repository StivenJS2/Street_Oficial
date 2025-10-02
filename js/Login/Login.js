document.getElementById("loginForm").addEventListener("submit", function(event) {
    const correo = document.getElementById("correo").value.trim();
    const contrasena = document.getElementById("contrasena").value.trim();
    const errorMsg = document.getElementById("error-msg");

    if (correo === "" || contrasena === "") {
        event.preventDefault();
        errorMsg.textContent = "⚠️ Todos los campos son obligatorios.";
    } else {
        errorMsg.textContent = "";
    }
});
