<?php

class AlumnosC{

	//Ver perfil Alumno
	public function VerPerfilAlumnoC(){

		$tablaBD = "alumnos";
		
		if ($_SESSION["rol"] == "Alumno") {
			
			$id = $_SESSION["id"];

		}else if ($_SESSION["rol"] == "Administrador") {
			
			$id = substr($_GET["url"], 14);

		}

		$resultado = AlumnosM::VerPerfilAlumnoM($tablaBD, $id);

		echo '<form">
				
		<div class="form-group">';
		
		if ($_SESSION["rol"] == "Alumno") {
			
			echo '<a href="http://localhost/psicologiaitsur/perfil-Al">
			<button class=" btn btn-lg btn-success"><i class="fa fa-pencil"> Editar</i></button>
		</a>';

		}else if ($_SESSION["rol"] == "Administrador") {
			
			echo '<a href="http://localhost/psicologiaitsur/perfil-Al/'.$resultado["id"].'">
			<button class=" btn btn-lg btn-success"><i class="fa fa-pencil"> Editar</i></button>
		</a>';

		}
					
		echo '</div>
					
		<div class="row">
			
			<div class="col-md-6 col-xs-12">
				
				<h2>Nombre:</h2>
				<h3>'.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h2>
				<input type="hidden" name="idAl" id="idAl" value="'.$resultado["id"].'">

				<h2>No. Control:</h2>
				<h3>'.$resultado["noControl"].'</h2>

				<h2>Carrera:</h2>
				<h3>'.$resultado["carrera"].'</h2>

				<h2>Correo Electronico:</h2>
				<h3>'.$resultado["correo"].'</h2>

				<h2>Contraseña:</h2>
				<h3>'.$resultado["clave"].'</h2>

			</div>


			<div class="col-md-6 col-xs-12">';

				if($resultado["foto"] == ""){

					echo '<img src="http://localhost/psicologiaitsur/Vistas/img/defecto.png" class="img-responsive" width="200px">';

				}else{

					echo '<img src="http://localhost/psicologiaitsur/'.$resultado["foto"].'" class="img-responsive" width="200px">';

					
				}
				
				echo '

			</div>

		</div>

		</form>';

	}

	//Editar Perfil Alumno (Alumno)
	public function EditarPerfilAlumnoC(){

		$tablaBD = "alumnos";
		if ($_SESSION["rol"] == "Alumno") {
			
			$id = $_SESSION["id"];

		}else if ($_SESSION["rol"] == "Administrador") {
			
			$id = substr($_GET["url"], 10);

		}
		

		$resultado = AlumnosM::VerPerfilAlumnoM($tablaBD, $id);

		echo '<form method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							
							<h2>Nombre:</h2>
							<input type="text" class="input-lg" name="nombreAl" value="'.$resultado["nombre"].'">
							<input type="hidden" name="idAl" value="'.$resultado["id"].'">	

							<h2>Apellido Paterno:</h2>
							<input type="text" class="input-lg" name="apellidopaternoAl" value="'.$resultado["apellidopaterno"].'">

							<h2>Apellido Materno:</h2>
							<input type="text" class="input-lg" name="apellidomaternoAl" value="'.$resultado["apellidomaterno"].'">

							<h2>No. Control:</h2>
							<input type="text" class="input-lg" name="noControl" value="'.$resultado["noControl"].'">
					
							<h2>Correo Electronico:</h2>
							<input type="text" class="input-lg" name="correoAl" value="'.$resultado["correo"].'">

							<h2>Contraseña:</h2>
							<input type="text" class="input-lg" name="claveAl" value="'.$resultado["clave"].'">	
							
						</div>


						<div class="col-md-6 col-xs-12">
							
							<br><br>

							<input type="file" name="imgAl">
							<br>';

							if($resultado["foto"] == ""){

								echo '<img src="http://localhost/psicologiaitsur/Vistas/img/defecto.png" class="img-responsive" width="200px">';

							}else{

								echo '<img src="http://localhost/psicologiaitsur/'.$resultado["foto"].'" class="img-responsive" width="200px">';

								
							}
							

							echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

							<br><br>

							<button type="submit" class="btn btn-success">Guardar Cambios</button>

						</div>

					</div>

				</form>';

	}

	//Actualizar Perfil Alumno (Alumno)
	public function ActualizarPerfilAlumnoC(){

		if(isset($_POST["idAl"])){

			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgAl"]["tmp_name"]) && !empty($_FILES["imgAl"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}


				if($_FILES["imgAl"]["type"] == "image/png"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Alumnos/Al-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgAl"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

				if($_FILES["imgAl"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Alumnos/Al-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgAl"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

			}

			$tablaBD = "alumnos";

			$datosC = array("id"=>$_POST["idAl"], "nombre"=>$_POST["nombreAl"], "apellidopaterno"=>$_POST["apellidopaternoAl"], "apellidomaterno"=>$_POST["apellidomaternoAl"], "noControl"=>$_POST["noControl"], "correo"=>$_POST["correoAl"], "clave"=>$_POST["claveAl"], "foto"=>$rutaImg);

			$resultado = AlumnosM::ActualizarPerfilAlumnoM($tablaBD, $datosC);

			if($resultado == true){

				if ($_SESSION["rol"] == "Alumno") {
					
					echo '<script>
					window.location = "http://localhost/psicologiaitsur/perfil-'.$_SESSION["rol"].'";
					</script>';

				}else if ($_SESSION["rol"] == "Administrador"){

					echo '<script>
					window.location = "http://localhost/psicologiaitsur/alumnos";
					</script>';

				}

			}

		}

	}

	//Mostrar Alumnos
	static public function VerAlumnosC($columna, $valor){
		
		$tablaBD = "alumnos";

		$resultado = AlumnosM::VerAlumnosM($tablaBD, $columna, $valor);
		return $resultado;

	}

    //Crear Alumnos
	public function CrearAlumnoC(){


		if(isset($_POST["rolP"])){
			
			$tablaBD = "alumnos";

			$datosC = array("nombre"=>$_POST["registronombre"], "apellidopaterno"=>$_POST["registroapaterno"], "apellidomaterno"=>$_POST["registroamaterno"], "sexo"=>$_POST["sexoAlumno"], "fechaN"=>$_POST["registrofnacimiento"], "noControl"=>$_POST["registronocontrol"], "carrera"=>$_POST["registrocarrera"], "correo"=>$_POST["registrocorreo"], "clave"=>$_POST["registrocontrasena"], "rol"=>$_POST["rolP"]);
			$resultado = AlumnosM::CrearAlumnoM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "iniciar-sesion";
				</script>';

			}
		}
	}

	//Mostrar Alumno
	static public function AlumnoC($valor){

		$tablaBD = "alumnos";

		$resultado = AlumnosM::AlumnoM($tablaBD, $valor);

		return $resultado;

	}

}