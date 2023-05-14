<?php
include_once ("header.php");
?>
    <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
    <div class="alert <?php print $datos["color"] ."mt-3"?>">
        <h4><?php print $datos["texto"]; ?></h4>
    </div> 
    <a href="<?php print RUTA.$datos["url"];?>" class="btn <?php print $datos["colorBoton"] ?>"><?php print $datos["textBoton"];?></a>                     

<?php
include_once ("header.php");
?>