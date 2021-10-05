<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD{

	//Ingreso Usuarios
	static public function IngresarUsuarioM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE correo = :correo");

		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}
    
}