<?php
/**
 * Aqui crearemos los metodos auxiliares, que se ejecutaran siempre o varias veces.
 */

 class Auxiliar
 {
    function __construct()
    {
        
    }

    public function modelo($modelo="")
    {
        require_once("../app/models/".$modelo.".php");
        return new $modelo();
    }

    public function vista($vista="", $datos=[])
    {
        if (file_exists("../app/views/".$vista.".php")) {
            require_once("../app/views/".$vista.".php");
        } else {
           die("No existe parametro requerido: ".$vista);
        }
        
    }
 }