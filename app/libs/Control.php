<?php

/**
 * Con este controlador manejaremos las peticiones o la URI y lanzaras los procesos oportunos
 * primer param=controlador
 * el segundo = las funciones o metodos
 * tercero = demas parametros
 */

class Control {

    function __construct()
    {
        $url = $this->separarURL();
        //verificamos lo que recibimos var_dump()
        var_dump($url);
    }

    public function separarURL()
    {
        $url = "";
        if(isset($_GET['url'])){
            //eliminamos el caracer final 
            $url = rtrim($_GET["url"],"/");
            $url = rtrim($_GET["url"],"\\");

            //Eliminamos caracteres que no sean utiles.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //
            $url = explode("/",$url);

        }
        return $url;
    }
}