<?php
/**
 * Admin Dashboard
 */

 class Admin extends Auxiliar {
    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("AdminModelo");
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
            $this->vista("adminCaratulaVista",$datos);
        }else{
            header("location:".RUTA);
        }
    }
 }