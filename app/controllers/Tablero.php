<?php
/**
 * Admin Dashboard
 */

 class Tablero extends Auxiliar {
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("TableroModelo");
    }

    function caratula(){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            //
            $datos = [
                "titulo" => "Bienvenid@",
                "subtitulo" => "Bienvenid@ a App",
                "menu" => true
            ];
            $this->vista("tableroCaratulaVista",$datos);
        }else{
            header("location:".RUTA);
        }
    }
 }