<?php
/**
 * Desde esta clase manejaremos las peticiones que tengan que ver con Login
 */
class Login extends Auxiliar {

    function __construct()
    {
        print "Hola desde Login<br>";
    }

    //Este es un metodo para la vista.
    public function caratula()
    {
        print "Hola desde metodo caratula<br>";
    }

    // Creamos un metodo que tomara todos los valores de los parametros introducidos en la url
    public function metodoVariable()
    {
        if (func_num_args()>0) {
            for($i=0; $i < func_num_args(); $i++){
                print func_get_arg($i)."<br>";
            }
        } else {
            print "Hola desde metodo variable , no hay argumentos<br>";
        }
        
    }

    // Asi tambien creamos un metodo con parametros fijos.
    public function metodoFijo($p1="Uno",$p2="Dos")
    {
        
         print $p1."Hola desde metodo fijo<br>";
         print $p2."Hola desde metodo fijo<br>";
        
    }
}