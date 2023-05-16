<?php include_once("header.php"); ?>

<h1 class="text-center"><?php
  if (isset($datos["subtitulo"])) {
    print $datos["subtitulo"];
  }
 
  ?>
</h1>

<div class="card p-4 bg-light">
  <form action="<?php print RUTA; ?>gestempleados/alta/" method="post">
    <div class="form-group text-left">
        <label for="nombre">* Nombre:</label>
        <input type="text" name="nombre" class="form-control" required
        placeholder=""
        value="<?php 
        print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
        ?>"
        <?php
        if (isset($datos["baja"])) {
        print "disabled ";
        }
        ?>
        >
    </div>   
    <div class="form-group text-left">
        <label for="apellidos">* Apellidos:</label>
        <input type="text" name="apellidos" class="form-control" required
        placeholder=""
        value="<?php 
        print isset($datos['data']['apellidos'])?$datos['data']['apellidos']:''; 
        ?>"
        <?php
        if (isset($datos["baja"])) {
        print "disabled ";
        }
        ?>
        >
    </div>
    <div class="form-group text-left">
        <label for="telefono">* Telefono:</label>
        <input type="text" name="telefono" class="form-control" required
        placeholder=""
        value="<?php 
        print isset($datos['data']['tlfn'])?$datos['data']['tlfn']:''; 
        ?>"
        <?php
        if (isset($datos["baja"])) {
        print "disabled ";
        }
        ?>
        >
    </div>
    <div class="form-group text-left">
        <label for="carnetConducir">* Carnet Conducir:</label>
        <input type="text" name="carnetConducir" class="form-control" required
        placeholder=""
        value="<?php 
        print isset($datos['data']['carnetConducir'])?$datos['data']['carnetConducir']:''; 
        ?>"
        <?php
        if (isset($datos["baja"])) {
        print "disabled ";
        }
        ?>
        >
    </div>
    <div class="form-group text-left">
        <label for="email">* Email:</label>
        <input type="email" name="email" class="form-control" required
        placeholder=""
        value="<?php 
        print isset($datos['data']['email'])?$datos['data']['email']:''; 
        ?>"
        <?php
        if (isset($datos["baja"])) {
        print "disabled ";
        }
        ?>
        >
    </div>
    <div class="form-group text-left">
      <input type="hidden" name="id" id="id" value="
      <?php
        if (isset($datos['data']['id'])) {
          print $datos['data']['id'];
        } else {
          print "";
        }
      ?>
      ">
      <?php
      if (isset($datos["baja"])) { ?>
        <a href="<?php print RUTA; ?>gestempleados/bajaLogica/<?php print $datos['data']['id']; ?>" class="btn btn-danger">Eliminar</a>
        <a href="<?php print RUTA; ?>gestempleados" class="btn btn-danger">Regresar</a>
        <p><b>Advertencia: una vez borrado el registro, no podrá recuperar la información</b></p>
      <?php } else { ?> 
      <input type="submit" value="Enviar" class="btn btn-success">
      <a href="<?php print RUTA; ?>gestempleados" class="btn btn-info">Regresar</a>
    <?php } ?> 
    <?php  ?>
    </div> 
  </form>
</div>
<?php include_once("footer.php"); ?>