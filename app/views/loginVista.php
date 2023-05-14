<?php
include_once ("header.php");
?>
                <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
                <div class="card p-4 bg-light">
                    
                    <form action="" method="post">
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
                                <button type="submit" class="btn btn-primary" style="margin:auto 200px;">Entrar</button>
                                </div>
                            </div> 
                            <a href="http://" class="" style="text-decoration: none;">*Registrarme</a>
                            
                        </div>
                    </form>
                </div>                

<?php
include_once ("header.php");
?>