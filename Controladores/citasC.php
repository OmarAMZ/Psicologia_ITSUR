<?php

class CitasC{
    //Guardar Datos de Cita(Alumno)
    public function GuardarDatosAlumnoC($fecha, $hora, $fhI, $fhF, $valor){
        if(isset($fecha)){
            $_SESSION["idAlumno"]=$_SESSION["horaB"]=$_SESSION["fhI"]=$_SESSION["fhF"]=$_SESSION["fechaL"]= null;

            $_SESSION["idAlumno"]=$_SESSION["id"];
            $_SESSION["horaB"]=$hora;
            $_SESSION["fhI"]=$fhI;
            $_SESSION["fhF"]=$fhF;
            
            /*Tranformacion de Fecha a letras*/
            
            $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
            $dia = $dias[date('w', strtotime($fecha))];
            $num = date("j", strtotime($fecha));
            $meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
            $mes = $meses[(date('m', strtotime($fecha))*1)-1];
            $anno = date("Y", strtotime($fecha));
            $fechaletra= $dia.', '.$num.' de '.$mes.' del '.$anno;;    

            ///////////////////////////////////
            
            $_SESSION["fechaL"]= $fechaletra;
            if(isset($_SESSION["fhI"])){
                
                echo '<script>

                window.location = "http://localhost/psicologiaitsur/formulario/'.$valor.'";
                </script>';

            }

        }

    }

    //Guardar Datos de Cita(Psicologo)
    public function GuardarDatosPsicologoC($fecha, $hora, $fhI, $fhF, $id_Alumno, $valor){
        if(isset($fecha)){
            $_SESSION["idAlumno"]=$_SESSION["horaB"]=$_SESSION["fhI"]=$_SESSION["fhF"]=$_SESSION["fechaL"]= null;

            $_SESSION["idAlumno"]=$id_Alumno;
            $_SESSION["horaB"]=$hora;
            $_SESSION["fhI"]=$fhI;
            $_SESSION["fhF"]=$fhF;
            
            /*Tranformacion de Fecha a letras*/
            
            $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
            $dia = $dias[date('w', strtotime($fecha))];
            $num = date("j", strtotime($fecha));
            $meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
            $mes = $meses[(date('m', strtotime($fecha))*1)-1];
            $anno = date("Y", strtotime($fecha));
            $fechaletra= $dia.', '.$num.' de '.$mes.' del '.$anno;;    

            ///////////////////////////////////
            
            $_SESSION["fechaL"]= $fechaletra;
            if(isset($_SESSION["fhI"])){
                
                echo '<script>

                window.location = "http://localhost/psicologiaitsur/formulario/'.$valor.'";
                </script>';

            }

        }

    }

    //Pedir Cita (Alumno)
	public function EnviarCitaC($valor){
        if (isset($valor)) {
            echo "<script>console.log( 'Aqui Va 2' );</script>";
			$tablaBD = "citas";

			$datosC = array("Pid"=>$valor, "Aid"=>$_SESSION["idAlumno"], "fechayhoraI"=>$_SESSION["fhI"], "fechayhoraF"=>$_SESSION["fhF"]);

			$resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/psicologiaitsur/inicio";
				</script>';

			}

        }

	}

    //Mostrar Citas
	public function VerCitasC(){

		$tablaBD = "citas";

		$resultado = CitasM::VerCitasM($tablaBD);

		return $resultado;

	}

    //Mostrar Horas Libres
	public function VerHorasLC(){

		$tablaBD = "horasL";

		$resultado = CitasM::VerHorasLM($tablaBD);

		return $resultado;

	}

    //Eliminar Horas Libres
	public function EliminarHoraLC($id){

		$tablaBD = "horasL";

		$resultado = CitasM::EliminarHoraLM($tablaBD, $id);

		if($resultado == true){

            echo '<script>

            window.location = "http://localhost/psicologiaitsur/citas/'.$_SESSION["id"].'";
            </script>';

        }

	}

    //Mostrar Historial Citas
	public function VerHistorialCitasC($id_Alumno){

		$tablaBD = "citas";

		$resultado = CitasM::VerHistorialCitasM($tablaBD, $id_Alumno);

		return $resultado;

	}

    //Añadir Horas Libres
	public function HorasLibresC($valor){
        
        if (isset($valor)) {
			$tablaBD = "horasL";
            $hInicio = $_POST["timeHoraI"].":00";
            $hFin = $_POST["timeHoraF"].":00";
            
            $fechaInicio=strtotime($_POST["fechaInicio"]);
            $fechaFin=strtotime($_POST["fechaFin"]);
            $a=1;
            
            for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
                $datosC = array("Pid"=>$valor, "fechayhoraI"=>''.date("Y-m-d", $i).' '.$hInicio.'', "fechayhoraF"=>''.date("Y-m-d", $i).' '.$hFin.'');
                $resultado = CitasM::EnviarHorasLM($tablaBD, $datosC);
            }

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/psicologiaitsur/citas/'.$_SESSION["id"].'";
				</script>';

			}

        }

	}

    //Mostrar Cita
	public function VerCitaC($valor){
        
        if (isset($valor)) {
            
            echo '<script>
            
            window.location = "http://localhost/psicologiaitsur/Ver-cita/'.$valor.'";
            </script>';

        }

	}

    //Mostrar Datos Cita
	static public function CitaC($columna, $valor){

		$tablaBD = "citas";

		$resultado = CitasM::CitaM($tablaBD, $columna, $valor);

		return $resultado;

	}

    //Cancelar Cita(Psicologo)
	public function CancelarCitasC($id){

		$tablaBD = "citas";

		$resultado = CitasM::CancelarCitasM($tablaBD, $id);

		if($resultado == true){

            echo '<script>

            window.location = "http://localhost/psicologiaitsur/citas/'.$_SESSION["id"].'";
            </script>';

        }

	}

    //Cancelar Finalizar Citas (Automaticamente)
	public function FinalizarCitasAC($fecha, $hora){
        
		$tablaBD = "citas";

		$resultado = CitasM::FinalizarCitasAM($tablaBD, $fecha, $hora);

	}

}