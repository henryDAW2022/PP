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
    }
}