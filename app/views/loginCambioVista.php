<?php
include_once ("header.php");
?>
                <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
                <div class="card p-4 bg-light">
                    
                    <form action="<?php print RUTA;?>login/cambiarclave/" method="POST">
                        <div class="mb-3">
                          <label for="">*Nueva Clave de acceso: </label>
                          <input type="password" name="clave" id="clave" class="form-control" placeholder="introduce tu nueva clave de acceso..." >
                        </div>
                   
                        <div class="mb-3">
                          <label for="">*Repite tu nueva clave de acceso: </label>
                          <input type="password" name="verifica" id="verifica" class="form-control" placeholder="Repite tu nueva clave de acceso.." >
                        </div>

                        <div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto centrarme">
                                    <input type="hidden" name="id" value="<?php print $datos['data']; ?>"/>
                                    <input type="submit" class="btn btn-primary" " value="Enviar">
                                </div>
                            </div>                            
                        </div>
                    </form>
                </div>                

<?php
include_once ("header.php");
?>