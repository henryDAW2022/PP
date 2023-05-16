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
		$datos = [
			"titulo" => "Empleados",
			"subtitulo" => "Listado de conductores",
			"menu" => true,
			"activo" => "gestempleados",
			"data" => $data
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

		//Vista Alta
		$datos= [
			"titulo" => "Alta nuevo Conductor",
			"subtitulo" => "Alta nuevo Conductor",
			"menu" => true,
			"activo" => "gestemp",
			"errores" => $errores,
			"data" => $data
		];
		$this->vista("conductoresAltaVista", $datos);
	}
}