<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Henry App | <?php print $datos["titulo"]; ?></title>
    <link rel="shortcut icon" href="<?php print RUTA;?>public/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="<?php print RUTA.'tablero/';?>" class="navbar-brand">App Henry</a>
        <?php
            if(isset($datos["menu"]) && $datos["menu"]==true) { //el true es innecesario, pero para claridad se pone
                print "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."gestempleados' class='nav-link";
                    if(isset($datos["activo"]) && $datos["activo"]=="gestemp") print "active";
                    print"'>Gestion Empleados</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."analitica' class='nav-link";
                    if(isset($datos["activo"]) && $datos["activo"]=="analitica") print "active";
                    print"'>Análisis</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."trayectos' class='nav-link";
                    if(isset($datos["activo"]) && $datos["activo"]=="trayectos") print "active";
                    print"'>Trayectos</a>";
                    print "</li>";
                    //
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."horarios' class='nav-link";
                    if(isset($datos["activo"]) && $datos["activo"]=="horarios") print "active";
                    print"'>Horarios</a>";
                    print "</li>";
                print "</ul>";
                //
                print "<ul class='nav navbar-nav ms-auto'>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."tablero/perfil' class='nav-link'>| Perfil </a>";
                    print "</li>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."tablero/logout' class='nav-link'>| Salir </a>";
                    print "</li>";
                print "</ul>";
            }
        ?>
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