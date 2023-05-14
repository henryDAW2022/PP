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

    //Metodo para validar correo
    public function validarCorreo($email)
    {
        $query = "SELECT * FROM Admin WHERE email='".$email."'";
        $data = $this->db->query($query);
        return (count($data)==0)?false:true;
    }
}