<?php
/**
 * Desde esta clase manejaremos las peticiones que tengan que ver con Login
 */
class Login extends Auxiliar {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("LoginModelo"); //el metodo modelo, lo heredamos de la clase Auxiliar.
    }

    //Este es un metodo para la vista.
    public function caratula()
    {
        if(isset($_COOKIE["datos"])){
            $datos_array = explode("|",$_COOKIE["datos"]);
            $usuario = $datos_array[0];
            $clave = $datos_array[1];
            $data = [
                "usuario" => $usuario,
                "clave" => $clave,
                "recordar" => "on"
            ];
        }else{
            $data = [];
        }
        $datos = [
            "titulo" => "Entrada",
            "subtitulo" => "Entrada al sistema",
            "data" => $data
        ];
        $this->vista("loginVista", $datos); //loginVista viene de views, es un archivo php
    
    }

    public function olvido()
    {

        //haremos un if, para ver si estamos recibiendo informacion por medio del METHOD_REQUEST POST

        $errores=[];
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $email = $_POST['email']??""; //es una forma contraida

            //validaciones
            if($email==""){
                array_push($errores,"El email es requerido");
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                array_push($errores,"El email no es válido");
            }

            //Procesamiento
            //var_dump($errores); compruebo si estoy capturando el mensaje de error
            if(empty($errores)){
                if ($this->modelo->validarCorreo($email)) {
                    //enviamos email
                    //var_dump("Correo válido!");
                    //exit(0);
                    if (!$this->modelo->enviarEmail($email)) {
                        //print "email enviado";
                        $datos = [
                            "titulo" => "Cambio de clave de acceso",
                            "menu" =>false,
                            "errores" => [],
                            "data" => [],
                            "subtitulo" => "Cambio de clave de acceso",
                            "texto" => "Se ha enviado un correo a <b>".$email."</b> para que puedas cambiar tu clave de acceso.
                            Si necesitas ayuda envianos un correo a soporte@henryapp.com. No olvides revisar tu bandeja de spam.",
                            "color" => "alert-success",
                            "url" => "login",
                            "colorBoton" => "btn-success",
                            "textBoton" => "Regresar"
                        ];
                        $this->vista("mensajeVista",$datos);
                    }else{
                        array_push($errores,"El email no fue enviado correctamente, lo sentimos.");
                    }
                } else {
                    array_push($errores,"Ese email no se encuentra en nuestra base de datos");
                }
                
            }
            if(!empty($errores)){

            
                $datos = [
                    "titulo" => "Olvido de Contraseña",
                    "subtitulo" => "¿Olvidaste tu contraseña?",
                    "errores" => $errores,
                    "data" => []
                ];
                $this->vista("loginOlvidoVista", $datos); //loginVista viene de views, es un archivo php
            
            }
        } else {
            $datos = [
                "titulo" => "Olvido de Contraseña",
                "subtitulo" => "¿Olvidaste tu contraseña?",
                "errores" => $errores,
                "data" => []
            ];
            $this->vista("loginOlvidoVista", $datos); //loginVista viene de views, es un archivo php
        }
    
    }

    //Metodo para cambiar clave de acceso
    public function cambiarclave($id='')
    {
        $errores=[];
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $id = isset($_POST["id"])?$_POST["id"]:"";
            $clave1 = isset($_POST["clave"])?$_POST["clave"]:"";
            $clave2 = isset($_POST["verifica"])?$_POST["verifica"]:"";

            //validaciones básicas

            if($clave1==""){
                array_push($errores,"La clave de acceso es requerida");
            }
            if($clave2==""){
                array_push($errores,"La clave de acceso de verificacion es requerida");
            }
            if($clave1!=$clave2){
                array_push($errores,"Las claves de acceso no coinciden");
            }

            if(count($errores)){
                //si hay errores
                $datos = [
                    "titulo" => "Cambiar clave de acceso",
                    "subtitulo" => "Cambiar clave de acceso",
                    "menu" => false,
                    "errores" => $errores,
                    "data" => $id
                ];
                $this->vista("loginCambioVista",$datos);
            }else {
                //No hay errores
                if($this->modelo->cambiarClaveAcceso($id, $clave1)){
                    $datos = [
                        "titulo" => "Modificar clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => $id,
                        "subtitulo" => "Modificar clave de acceso",
                        "texto" => "La modificacion de la clave de acceso se ha realizado con exito",
                        "color" => "alert-success",
                        "url" =>"login",
                        "colorBoton" => "btn-success",
                        "textBoton" => "Regresar"
                    ];
                    $this->vista("mensajeVista",$datos);
                } else {
                    $datos = [
                        "titulo" => "Error al modificar la clave de acceso",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Error al modificar la clave de acceso",
                        "texto" => "La modificacion de la clave de acceso no se ha realizado, existe un error",
                        "color" => "alert-danger",
                        "url" =>"login",
                        "colorBoton" => "btn-danger",
                        "textBoton" => "Regresar"
                    ];
                    $this->vista("mensajeVista",$datos);
                }
            }

        } else {
            $datos = [
                "titulo" => "Cambio de Contraseña",
                "subtitulo" => "Cambio de contraseña",
                "errores" => $errores,
                "data" => $id
            ];
            $this->vista("loginCambioVista", $datos);
        }
    }


    public function verificar()
    {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $usuario = $_POST['usuario']??"";
            $clave = $_POST["pass"]??"";
            $recordar = isset($_POST['recuerda'])?"on":"off";
            $errores = $this->modelo->verificar($usuario, $clave);

            //recuerdame

            $valor = $usuario."|".$clave;
            if ($recordar=="on") {
                $fecha = time()+(60*60*24*7);
            } else {
                $fecha = time()-1;
            }

            setcookie("datos",$valor,$fecha,RUTA);
            


            // validacion
            if(empty($errores)){
                //pasaremos a la vista del dashboard de admin
                header("location:".RUTA."admin");
            }else{
                //datos erroneos
                $datos =[
                    "titulo" => "login",
                    "subtitulo" => "Entrada al sistema",
                    "menu" => false,
                    "errores" => $errores
                ];
                $this->vista("loginVista",$datos);
            }
        }
    }
    // Creamos un metodo que tomara todos los valores de los parametros introducidos en la url para ver como funciona MVC
    // public function metodoVariable()
    // {
    //     if (func_num_args()>0) {
    //         for($i=0; $i < func_num_args(); $i++){
    //             print func_get_arg($i)."<br>";
    //         }
    //     } else {
    //         print "Hola desde metodo variable , no hay argumentos<br>";
    //     }
        
    // }

    // // Asi tambien creamos un metodo con parametros fijos.
    // public function metodoFijo($p1="Uno",$p2="Dos")
    // {
        
    //      print $p1."Hola desde metodo fijo<br>";
    //      print $p2."Hola desde metodo fijo<br>";
        
    // }



}