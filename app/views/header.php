<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Henry App | <?php print $datos["titulo"]; ?></title>
    <link rel="shortcut icon" href="<?php print RUTA;?>public/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
</head>
<body>

    <nav class="navbar nav-bat-espand-sm bg-dark navbar-dark">
        <a href"#" class="navbar-brand">App Henry</a>
    </nav>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2">

            </div>
            <div class="col-sm-8">
                <?php  
                if(isset($datos["errores"])){
                    if(count($datos["errores"])>0){
                        print "<div class='alert alert-danger mt-3'>";
                        foreach($datos["errores"] as $valor){
                            print "<strong>* ".$valor."</strong><br>";
                        }
                        print "</div>";
                    }
                }
                ?>