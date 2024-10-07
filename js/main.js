// Validación básica de formulario en JavaScript
document.getElementById("loginForm").addEventListener("submit", function(event) {
    var password = document.getElementById("password").value;
    if (password.length < 6) {
        alert("La contraseña debe tener al menos 6 caracteres.");
        event.preventDefault();
    }
});
