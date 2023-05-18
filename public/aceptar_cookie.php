<?php
// Verificar si se envió el formulario de aceptación de la cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Establecer la cookie con nombre "aceptaCookie" y valor "aceptada"
    setcookie("aceptaCookie-AppHenry", "aceptada", time() + 86400, "/"); // La cookie expirará en 1 día (86400 segundos)
    header("Location: index.php"); // Redireccionar al usuario a la página principal del proyecto
    exit();
}
?>
