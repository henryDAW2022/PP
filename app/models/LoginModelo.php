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
        $query = "SELECT * FROM admin WHERE email='".$email."'";
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
            if (empty($data)) {
                // var_dump($data); Comprobamos que recibimos datos
                $id = $data["id"];
                $nombre = $data["nombre"];

                $msg = $nombre. ", entra al siguiente link, para cambiar tu contraseña de acceso al sistema....<br>";
                $msg.="<a href='".RUTA."'login/cambiarclave/'".$id."'>Cambiar contraseña</a>'";

                $headers = "MIME-Version: 1.0\r\n";
                $headers.= "Content-type: text/html; charset=UTF-8\r\n";
                $headers.= "From: Henry-Aplicacion\r\n";
                $headers.= "Reply-to: soporte@henryapp.com\r\n";
                //var_dump($msg); //Compruebo que salga datos.
                return @mail($email,$msg,$headers); //Se utiliza arroba cuando no queremos mostrar nada visual.

            } else {
                return false;
            }
            
        }
    }


    public function getUsuarioEmail($email="")
    {
        $sql = "SELECT * FROM admin WHERE email='".$email."' and status='activo'";
        $data = $this->db->query($sql);
        return $data;
    }


    public function cambiarClaveAcceso($id, $clave){  //ojo con la sintaxis...dio error por un espacio en la sentencia sql faltaba espacios
        $r = false;
        $clave = hash_hmac("sha512", $clave, CLAVE);
        $sql = "UPDATE admin SET ";
        $sql.= "pass='".$clave."' ";
        $sql.="WHERE id=".$id;
        $r = $this->db->queryBoolean($sql);
        return $r;
    }

    public function verificar($usuario, $clave){
        $errores = array();
        $sql = "SELECT * FROM admin WHERE email='".$usuario."'";
        $clave = hash_hmac("sha512", $clave, CLAVE);
        $clave = substr($clave,0,200);

        //consulta
        $data = $this->db->query($sql);

        //validacion
        if (empty($data)){
            array_push($errores, "No existe ese usuario en nuestra base de datos, asegurate de haber ingresado bien los datos.");
        }else if($clave!=$data["pass"]){
            array_push($errores, "Clave de acceso erronea, asegurate de haber ingresado bien los datos.");
        }
        return $errores;
    }

}