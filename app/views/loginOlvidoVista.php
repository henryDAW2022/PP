<?php
include_once ("header.php");
?>
                <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
                <div class="card p-4 bg-light">
                    
                    <form action="/MVC/PP/login/olvido/" method="post">
                        <div class="mb-3">
                          <label for="">*Email: </label>
                          <input type="text" name="email" id="email" class="form-control" placeholder="introduce email con el que te registraste.." >
                        </div>
                        <div>
                            <div class="row g-3 align-items-center">
                                
                                <div class="col-auto">
                                <input type="submit" class="btn btn-primary" value="Enviar">
                                <a href="/MVC/PP/" type="button" class="btn btn-info">Regresar</a>
                                </div>
                            </div> 
                            
                        </div>
                    </form>
                </div>                

<?php
include_once ("header.php");
?>