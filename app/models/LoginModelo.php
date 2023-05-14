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

    //Metodo para enviar email, para recuperar contraseña.
    public function enviarEmail($email='')
    {
        $data=[];
        if($email==""){
            return false;
        }else{
            $data = $this->getUsuarioEmail($email);
            if (!empty($data)) {
                // var_dump($data); Comprobamos que recibimos datos
                $id = $data["id"];
                $nombre = $data["nombre"];

                $msg = $nombre. ", entra al siguiente link, para cambiar tu contraseña de acceso al sistema....<br>";
                $msg.="<a href='".RUTA."'login/cambiarClave/'".$id."'>Cambiar contraseña</a>";

                $headers = "MIME-Version: 1.0\r\n";
                $headers.= "Content-type: text/html; charset=UTF-8\r\n";
                $headers.= "From: Henry-Aplicacion\r\n";
                $headers.= "Reply-to: soporte@henryapp.com\r\n";
                var_dump($msg); //Compruebo que salga datos.
                return @mail($email,$asunto,$msg,$headers); //Se utiliza arroba cuando no queremos mostrar nada visual.

            } else {
                return false;
            }
            
        }
    }


    public function getUsuarioEmail($email="")
    {
        $sql = "SELECT * FROM Admin WHERE email='".$email."' and status='activo'";
        $data = $this->db->query($sql);
        return $data;
    }




}