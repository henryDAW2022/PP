<?php
/**
 * Empleados Modelo
 */
class GestempleadosModelo
{
	public $db;
		
	function __construct()
	{
		$this->db = new MySQLdb();
	}


	public function gettotalempleados(){
		$sql= "SELECT * FROM totalconductores";
		$data = $this->db->querySelect($sql);
		return $data;
	}

	public function getEmpleados(){
		$sql= "SELECT * FROM conductor";
		$data = $this->db->querySelect($sql);
		return $data;
	}

	public function getConductorId($id){
		$sql= "SELECT * FROM conductor WHERE id=".$id." AND status=1";
		$data = $this->db->query($sql);
		return $data;
	}


	public function altaConductor($data){
		$sql = "INSERT INTO conductor VALUES(0,";     //.1 id
		$sql.= "'".$data['nombre']."',";              //2. nombre
		$sql.= "'".$data['apellidos']."',"; 		  //3. apellidos
		$sql.= "'".$data['carnetConducir']."',";      //4. carnet conducir
		$sql.= "'".$data['email']."',"; 			  //5. email
		$sql.= "'12345',"; 							  //6. password general
		$sql.= "'".$data['tlfn']."',"; 				  //7. telefono
		$sql.= "'',"; 					  //8. fecha nacimiento olvidado arreglarlo
		$sql.= "'1',"; 						  //9. status, activo por defecto en un alta nueva.
		$sql.= "'',";						  //10. fecha login ....hay que mirar como lo definimos
		$sql.= "'',";						  		  //11. fecha baja ....hay que mirar como lo definimos
		$sql.= "'',";						      //12. fecha modif ....hoy por defecto para altas
		$sql.= "'')";						      //13. fecha creacion ....hoy por defecto para altas

		print $sql;
		return $this->db->queryBoolean($sql);

	}

	public function modificaConductor($data)
	{
		$salida = false;
		if(!empty($data["id"])){
			$sql = "UPDATE conductor SET ";
			$sql.="nombre='".$data["nombre"]."',";
			$sql.="apellidos='".$data["apellidos"]."',";
			$sql.="carnetConducir='".$data["carnetConducir"]."',";
			$sql.="pass='".$data[""]."',";
			$sql.="tlfn='".$data[""]."',";
			$sql.="fechNac='".$data[""]."',";
			$sql.="status='".$data[""]."',";
			$sql.="login_dt='".$data[""]."',";
			$sql.="baja_dt='".$data[""]."',";
			$sql.="modificado_dt= (NOW())";
			$sql.="WHERE id=".$data["id"];

			//enviamos a la base de datos
			$salida = $this->db->queryBoolean($sql);
		}
		return $salida;
	}
}