<?php
/**
 * el modelo para Login
 */

class LoginModelo{

    public $db;

    public function __construct()
    {
        $this->db = new Mysqldb(); // simplemente creamos la conexion a la base de datos
    }
}