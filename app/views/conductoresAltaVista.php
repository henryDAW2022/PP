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
  </form>
</div>
<?php include_once("footer.php"); ?>