<?php

require_once "ConexionBD.php";

class AlumnosM extends ConexionBD{

	//Ver perfil Alumno
	static public function VerPerfilAlumnoM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	//Actualizar Perfil Alumno (Alumno)
	static public function ActualizarPerfilAlumnoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, apellidopaterno = :apellidopaterno, apellidomaterno = :apellidomaterno, noControl = :noControl, correo = :correo, clave = :clave, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidopaterno", $datosC["apellidopaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidomaterno", $datosC["apellidomaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":noControl", $datosC["noControl"], PDO::PARAM_STR);
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

	//Mostrar Alumnos
	static public function VerAlumnosM($tablaBD, $columna, $valor){
		
		if ($columna != null) {
			
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna ORDER BY apellidopaterno ASC");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo ->fetch();
			
		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE rol = 'Alumno' ORDER BY apellidopaterno ASC");

			$pdo -> execute();

			return $pdo ->fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}

    //Crear Alumnos
	static public function CrearAlumnoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, apellidopaterno, apellidomaterno, correo, clave, sexo, noControl, carrera, fechaN, rol) VALUES (:nombre, :apellidopaterno, :apellidomaterno, :correo, :clave, :sexo, :noControl, :carrera, :fechaN, :rol)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidopaterno", $datosC["apellidopaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellidomaterno", $datosC["apellidomaterno"], PDO::PARAM_STR);
		$pdo -> bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam(":fechaN", $datosC["fechaN"], PDO::PARAM_STR);
        $pdo -> bindParam(":noControl", $datosC["noControl"], PDO::PARAM_STR);
        $pdo -> bindParam(":carrera", $datosC["carrera"], PDO::PARAM_STR);
        $pdo -> bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar Alumno
	static public function AlumnoM($tablaBD, $valor){
		
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
		
		$pdo -> bindParam(":id", $valor, PDO::PARAM_STR);
		
		$pdo->execute();
		
		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

}