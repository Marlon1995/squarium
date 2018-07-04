<?php
class Herramienta{
	private $conexion;

	function __construct(){
		require_once("base.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	public function ingresar_datos($t, $ph,$ox){
		$sql = " insert into sensor values (null, ?, ?, now(),null) ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1, $temp);
		$stmt->bindValue(2, $ph);
		$stmt->bindValue(3, $ox);
		$stmt->bindValue(4, $lumi);

		if($stmt->execute()){
			echo "Ingreso Exitoso";
		}else{
			echo "no se pudo registrar datos";
		}
	}
}
?>