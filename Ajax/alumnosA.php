<?php

require_once "../Controladores/alumnosC.php";
require_once "../Modelos/alumnosM.php";

class AlumnosA{
	
	public $Aid;
	
	public function EAlumnoA(){

		$columna = "id";
		$valor = $this->Aid;
		$tablaBD = "alumnos";

		$resultado = AlumnosC::VerPerfilAlumnoM($tablaBD, $valor);

		echo json_encode($resultado);

	}
	

}
if(isset($_POST["Aid"])){
	/*
	echo '<script>
		window.location = "http://localhost/psicologiaitsur/perfil-Alumno";
		</script>';*/
		echo "<script>console.log( 'Aqui Va' );</script>";

}