<?php include_once("header.php"); ?>

<h1 class="text-center"><?php
  if (isset($datos["subtitulo"])) {
    print $datos["subtitulo"];
  }
 
  ?>
</h1>
<div>
<table class="table table-striped" width="100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>fecha alta</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            for($i=0; $i<count($datos['data']); $i++){
                print "<tr>";
                print "<td>".$datos["data"][$i]["id"]."</td>";
                print "<td class='text-left'>".$datos["data"][$i]["nombre"]."</td>";
                print "<td class='text-left'>".$datos["data"][$i]["apellidos"]."</td>";
                print "<td class='text-left'>".$datos["data"][$i]["creado_dt"]."</td>";
                print "<td><a href='".RUTA."gestempleados/modificar/".$datos["data"][$i]["id"]."'class=¡btn btn-info'>Modificar</a></td>";
                print "<td><a href='".RUTA."gestempleados/eliminar/".$datos["data"][$i]["id"]."'class=¡btn btn-danger'>Eliminar</a></td>";
                print "</tr>";
            }
        ?>
    </tbody>
</table>
</div>
<a href="<?php print RUTA;  ?>gestempleados/alta" class="btn btn-success">
Nuevo Conductor</a>
<?php include_once("footer.php"); ?>