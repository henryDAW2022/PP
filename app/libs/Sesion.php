<?php

/**
 * Manejar sesiones
 */

 class Sesion{
    private $login = false;
    private $usuario;

    function __construct()
    {
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->usuario = $_SESSION["usuario"];
            $this->login = true;
        }else{
            unset($this->usuario); //eliminamos el usuario
            $this->login = false; //lo volvemos a poner en false
        }
    }

    public function iniciarLogin($usuario){
        if ($usuario){
            $this->usuario = $_SESSION["usuario"] = $usuario;
            $this->login = true;
        }
    }

    public function finalizarLogin(){
        unset($_SESSION["usuario"]);
        unset($this->usuario);
        $this->login = false;
    }

    public function getLogin(){
        return $this->login;
    }
    public function getUsuario(){
        return $this->usuario;
    }
 }