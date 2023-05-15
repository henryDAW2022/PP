<?php

/**
 * Admin Modelo
 */

 class AdminModelo{
    function __construct()
    {
        $this->db = new Mysqldb();
    }
 }