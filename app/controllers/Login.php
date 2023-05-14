<?php
/**
 * Desde esta clase manejaremos las peticiones que tengan que ver con Login
 */
class Login extends Auxiliar {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("LoginModelo"); //el metodo modelo, lo heredamos de la clase Auxiliar.
    }

    //Este es un metodo para la vista.
    public function caratula()
    {
        $datos = [
            "titulo" => "Entrada",
            "subtitulo" => "Entrada al sistema"
        ];
        $this->vista("loginVista", $datos); //loginVista viene de views, es un archivo php
    
    }

    public function olvido()
    {
        $datos = [
            "titulo" => "Olvido de Contraseña",
            "subtitulo" => "¿Olvidaste tu contraseña?",
            "datos" => []
        ];
        $this->vista("loginOlvidoVista", $datos); //loginVista viene de views, es un archivo php
    
    }
    // Creamos un metodo que tomara todos los valores de los parametros introducidos en la url para ver como funciona MVC
    // public function metodoVariable()
    // {
    //     if (func_num_args()>0) {
    //         for($i=0; $i < func_num_args(); $i++){
    //             print func_get_arg($i)."<br>";
    //         }
    //     } else {
    //         print "Hola desde metodo variable , no hay argumentos<br>";
    //     }
        
    // }

    // // Asi tambien creamos un metodo con parametros fijos.
    // public function metodoFijo($p1="Uno",$p2="Dos")
    // {
        
    //      print $p1."Hola desde metodo fijo<br>";
    //      print $p2."Hola desde metodo fijo<br>";
        
    // }



}