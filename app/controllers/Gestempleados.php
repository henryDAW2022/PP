<?php  
/**
 * Controlador empleados
 */
class Gestempleados extends Auxiliar
{
	private $modelo;
	
	function __construct()
	{
		$this->modelo = $this->modelo("GestempleadosModelo");
	}

	public function caratula()
	{
		//Creamos sesion
		$sesion = new Sesion();

		if($sesion->getLogin()){
			//Leeemos datos de la tabla
			$data = $this->modelo->getEmpleados();
			$data2 = $this->modelo->gettotalempleados();
		$datos = [
			"titulo" => "Empleados",
			"subtitulo" => "Listado de conductores",
			"menu" => true,
			"activo" => "gestempleados",
			"data" => $data,
			"data2" => $data2
		];
		$this->vista("empleadosCaratulaVista",$datos);
		}else{
		header("location:".RUTA);
		}
    }

	public function alta(){
		//Definir array
		$data = array();
		$errores = array();

		if ($_SERVER['REQUEST_METHOD']=="POST"){
			//Miramos si viene un id, o no, si viene id es una modificacion, si no viene id es un alta nueva.
			$id = $_POST['id'] ?? ""; //operador ternario contraccion
			//
			$nombre = Helper::cadena($_POST['nombre'] ?? "");
			$apellidos = Helper::cadena($_POST['apellidos'] ?? "");
			$telefono = Helper::cadena($_POST['telefono'] ?? "");
			$carnet = Helper::cadena($_POST['carnetConducir'] ?? "");
			$email = Helper::cadena($_POST['email'] ?? "");

			//validaciones de informacion
			if(empty($nombre)){
				array_push($errores,"El campo nombre es requerido");
			}
			if(empty($apellidos)){
				array_push($errores,"El campo apellidos es requerido");
			}
			if(empty($telefono)){
				array_push($errores,"El campo telefono es requerido");
			}
			if(empty($carnet)){
				array_push($errores,"El campo carnet conducir es requerido");
			}
			if(empty($email)){
				array_push($errores,"El campo email es requerido");
			}
			//var_dump($errores);

			//creamos el array con los datos
			$data= [
				"id" => $id,
				"nombre" => $nombre,
				"apellidos" => $apellidos,
				"tlfn" => $telefono,
				"carnetConducir" => $carnet,
				"email" => $email
			];

			if(empty($errores)){
				//Enviamos datos al modelo
				if(trim($id)===""){
					//Alta de registro
					if($this->modelo->altaConductor($data)){
						header('location:'.RUTA."gestempleados");
					}
				}else{
					//Modificaciones
					if($this->modelo->modificaConductor($data)){
						header('location:'.RUTA."gestempleados");
					}
				}
			}
		}
		//Vista Alta
		$datos= [
			"titulo" => "Alta nuevo Conductor",
			"subtitulo" => "Alta nuevo Conductor",
			"menu" => true,
			"activo" => "gestempleados",
			"errores" => $errores,
			"data" => $data
		];
		$this->vista("conductoresAltaVista", $datos);
	}

	public function modificar($id=""){
		//Leemos los datos de la vista
		$data = $this->modelo->getConductorId($id);

		//Vista Alta
		$datos= [
			"titulo" => "Modificar datos del Conductor",
			"subtitulo" => "Modificar datos del Conductor",
			"menu" => true,
			"activo" => "gestempleados",
			"errores" => [],
			"data" => $data
		];
		$this->vista("conductoresAltaVista", $datos);
	}
}