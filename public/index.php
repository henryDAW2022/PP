<?php

// Verificar si la cookie de aceptación existe y su valor es "aceptada"
if (!isset($_COOKIE['aceptaCookie-AppHenry']) || $_COOKIE['aceptaCookie-AppHenry'] !== 'aceptada') {
    echo "Debe aceptar el uso de cookies para acceder al proyecto.";
    echo '<form method="post" action="aceptar_cookie.php">';
    echo '<input type="submit" value="Aceptar">';
    echo '</form>';
    exit();
}

require_once("../app/inicio.php"); //llamamos a nuestro archivo inicio, que cargara nuestro autoloader.
$control = new Control();
$bd = new Mysqldb();

