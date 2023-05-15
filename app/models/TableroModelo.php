<?php

/**
 * Tablero Modelo
 */

 class TableroModelo{
    function __construct()
    {
        $this->db = new Mysqldb();
    }
 }