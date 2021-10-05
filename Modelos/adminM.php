<?php

require_once "ConexionBD.php";

class AdminM extends ConexionBD{

	//Ver perfil Administradores
	static public function VerPerfilAdminM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT nombre, apellidopaterno, apellidomaterno, correo, clave, foto, rol, id FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}
	
	//Actualizar Perfil Administrador
	static public function ActualizarPerfilAdminM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, apellidopaterno = :apellidopaterno, apellidomaterno = :apellidomaterno, correo = :correo, clave = :clave, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidopaterno", $datosC["apellidopaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidomaterno", $datosC["apellidomaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		$pdo = null;

	}
	
}