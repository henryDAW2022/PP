<?php

/**
 * Con este controlador manejaremos las peticiones o la URI y lanzaras los procesos oportunos
 * primer param=controlador
 * el segundo = las funciones o metodos
 * tercero = demas parametros
 */

class Control {

    //parametros utilizados dentro de esta clase unicamente private
    private $controlador = "login"; //controller
    private $metodo ="caratula"; //vista
    private $parametros = [1,2,3,4,"pepe"]; //parametros

    function __construct()
    {
        $url = $this->separarURL();
        //verificamos lo que recibimos var_dump()
        // var_dump($url);

        if($url!="" && file_exists("../app/controllers/".ucwords($url[0]).".php")) //queremos ejecutar un controlador, para ello miramos que url no sea vacio y que el controlador existe
        {
            $this->controlador = ucwords($url[0]);
            unset($url[0]); //eliminamos
            //var_dump($url);
        }

        //Solicitamos la clase controller.
        require_once("../app/controllers/".ucwords($this->controlador).".php");
        //creamos la instancia
        $this->controlador = new $this->controlador;

        //Llamadas a los metodos Login, recordemos que en nuestra uri los metodos serían el segundo indice de la uri
        if(isset($url[1]))
        {
            if (method_exists($this->controlador,$url[1])) {
                $this->metodo = $url[1];
                unset($url[1]); //eliminamos para ir limpiando
            }
        }
        //parametros
        $this->parametros = $url?array_values($url):[]; //por si es posible de que llegue vacio utilizamos array_values()
        //print "<br>Metodo: ".$this->metodo."<br>"; Comprobamos si funciona
        //var_dump($this->parametros);
        call_user_func_array([$this->controlador,$this->metodo],$this->parametros);
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