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

	public function getEmpleados(){
		$sql= "SELECT * FROM conductor";
		$data = $this->db->querySelect($sql);
		return $data;
	}
}