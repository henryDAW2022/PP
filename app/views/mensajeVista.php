<?php
include_once ("header.php");
?>
    <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
    <div class="alert <?php print "&nbsp;".$datos["color"]." mt-3"?>">
        <h4><?php print $datos["texto"]; ?></h4>
    </div> 
    <a href="<?php print RUTA.$datos["url"];?>" class="btn <?php print $datos["colorBoton"] ?>"><?php print $datos["textBoton"];?></a>                     

<?php
//Comprobaciones
// var_dump($_POST['clave']);
// var_dump($_POST['verifica']);
// var_dump($_POST['id']);
include_once ("footer.php");
?>