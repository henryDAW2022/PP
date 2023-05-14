<?php
include_once ("header.php");
?>
                <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
                <div class="card p-4 bg-light">
                    
                    <form action="<?php print RUTA;?>login/verifica/" method="post">
                        <div class="mb-3">
                          <label for="">*Usuario: </label>
                          <input type="text" name="usuario" id="usuario" class="form-control" placeholder="introduce tu nombre de usuario o email" >
                        </div>
                   
                        <div class="mb-3">
                          <label for="">*Contraseña: </label>
                          <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña.." >
                        </div>

                        <div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto centrarme">
                                <input type="checkbox" name="recuerda" id="recuerda">
                                
                                <label for="" class="col-form-label">Recordar </label>
                                </div>
                                <div class="col-auto">
                                <input type="submit" class="btn btn-primary" style="margin:auto 200px;" value="Entrar">
                                </div>
                            </div>                            
                        </div>
                    </form>
                    <a href="<?php print RUTA;?>login/olvido/" style="display:inline-block">Olvidé mi contraseña</a><a href="http://" class="" style="text-decoration: none;"style="display:inline-block">*Registrarme</a>
                </div>                

<?php
include_once ("header.php");
?>