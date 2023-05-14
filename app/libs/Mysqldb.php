<?php

class Mysqldb{
    
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "prueba1";
    private $puert = "";
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host,$this->user, $this->pass,$this->db);

        if(mysqli_connect_errno()){
            print "Error de conexion, intente ver el fallo";
            exit();
        }else{
            //print "exito de conexion";
        }

        if(mysqli_set_charset($this->conn, "utf8")){
            //print"El conjunto de caracteres es: ".mysqli_character_set_name($this->conn)."<br>";
        }else{
            print "Error en la conversion de caracterers";
            exit();
        }


        //conexion con PDO 

        // $connString = "mysql:host=".$this->host.";dbname=".$this->db.";chartset=utf8";
        // try {
        //     //code...
        //     $this->conn = new PDO($connString,$this->user,$this->pass);
        //     $this->conn->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT);
        //     // print "exito";  comprobamos la conexion.
        // } catch (PDOException $e) {
        //     return "Error de conexion: ".$e->getMessage();
        // }
    }

    /**
     * Query que retorna un array asociativo
     */

     public function query($sql='')
     {
        $data = [];
        $req = mysqli_query($this->conn,$sql);
        // $req->execute();
        // return $req->fetchAll(PDO::FETCH_ASSOC);
        if($req){
            if(mysqli_num_rows($req)>0){
                $data = mysqli_fetch_assoc($req);
            }
        }
        return $data;
    }

    

}


