<?php

require_once "ConexionBD.php";

class PsicologosM extends ConexionBD{

	//Ver perfil Psicologo
	static public function VerPerfilPsicologoM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT correo, clave, apellidopaterno, apellidomaterno, nombre, foto, rol, id, TIME_FORMAT(TIME(horarioE),'%H:%i') As horarioE, TIME_FORMAT(TIME(`horarioS`),'%H:%i') As horarioS FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	//Actualizar Perfil Psicologo (Psicologo)
	static public function ActualizarPerfilPsicologoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, apellidopaterno = :apellidopaterno, apellidomaterno = :apellidomaterno, correo = :correo, clave = :clave, foto = :foto, horarioE = :horarioE, horarioS = :horarioS WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidopaterno", $datosC["apellidopaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidomaterno", $datosC["apellidomaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
		$pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{
			
			return false;

		}

		$pdo -> close();
		$pdo = null;

	}

	//Borrar Psicologo
	static public function BorrarPsicologoM($tablaBD, $id){
		
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar Psicologos
	static public function VerPsicologosM($tablaBD, $columna, $valor){
		
		if ($columna != null) {
			
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna AND rol = 'Psicologo' ORDER BY apellidopaterno ASC");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo ->fetch();
			
		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Psicologo' ORDER BY apellidopaterno ASC");

			$pdo -> execute();

			return $pdo ->fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}
	
	//Mostrar Calendario Psicologo
	static public function PsicologoM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}

	 //Crear Psicologos
	 static public function CrearPsicologoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, apellidopaterno, apellidomaterno, correo, clave, sexo, horarioE, horarioS, rol) VALUES (:nombre, :apellidopaterno, :apellidomaterno, :correo, :clave, :sexo, :horarioE, :horarioS, :rol)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidopaterno", $datosC["apellidopaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidomaterno", $datosC["apellidomaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
        $pdo -> bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
        $pdo -> bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
}