<?php

require_once "ConexionBD.php";

class CitasM extends ConexionBD{
    //Pedir Cita Alumno
	static public function EnviarCitaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_psicologo, id_alumno, fechayhoraI, fechayhoraF) VALUES (:id_psicologo, :id_alumno, :fechayhoraI, :fechayhoraF)");

		$pdo -> bindParam(":id_psicologo", $datosC["Pid"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_alumno", $datosC["Aid"], PDO::PARAM_INT);

		$pdo -> bindParam(":fechayhoraI", $datosC["fechayhoraI"], PDO::PARAM_STR);
		$pdo -> bindParam(":fechayhoraF", $datosC["fechayhoraF"], PDO::PARAM_STR);
		echo "<script>console.log( 'Aqui Va 2 ".$datosC["fechayhoraI"]."' );</script>";
		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Añadir Horas Libres
	static public function EnviarHorasLM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_psicologo, fechayhoraI, fechayhoraF) VALUES (:id_psicologo, :fechayhoraI, :fechayhoraF)");

		$pdo -> bindParam(":id_psicologo", $datosC["Pid"], PDO::PARAM_INT);
		$pdo -> bindParam(":fechayhoraI", $datosC["fechayhoraI"], PDO::PARAM_STR);
		$pdo -> bindParam(":fechayhoraF", $datosC["fechayhoraF"], PDO::PARAM_STR);
		
		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar Citas
	static public function VerCitasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT C.id, C.id_psicologo, A.nombre, A.apellidopaterno, A.apellidomaterno, `fechayhoraI`, `fechayhoraF`, estatus FROM $tablaBD C JOIN alumnos A ON C.id_alumno=A.id WHERE estatus != 'Cancelada'");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar Horas Libres
	static public function VerHorasLM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	//Eliminar Hora Libre
	static public function EliminarHoraLM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, pdo::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar Historial Citas
	static public function VerHistorialCitasM($tablaBD,  $id_Alumno){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id_alumno = :id");

		$pdo -> bindParam(":id", $id_Alumno, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	//Mostrar datos Cita
	static public function CitaM($tablaBD, $columna, $valor){

		if($columna != null){

			$pdo = ConexionBD::cBD()->prepare("SELECT id, id_psicologo, id_alumno, DATE(fechayhoraI) AS fechaI, TIME_FORMAT(TIME(fechayhoraI), '%H %i') AS horai, fechayhoraF, estatus FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}

	//Cancelar Cita(Psicologo)
	static public function CancelarCitasM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estatus = 'Cancelada' WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		$pdo = null;

	}

	//Cancelar Finalizar Citas (Automaticamente)
	static public function FinalizarCitasAM($tablaBD, $fecha, $hora){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET `estatus`= 'Finalizada' WHERE DATE(`fechayhoraF`) = DATE(:fecha) AND TIME(`fechayhoraF`) = TIME(:hora) AND `estatus` = 'Agendada'");

		$pdo -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$pdo -> bindParam(":hora", $hora, PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;

		}

		$pdo -> close();
		$pdo = null;

	}

}