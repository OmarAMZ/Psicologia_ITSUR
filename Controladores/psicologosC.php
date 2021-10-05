<?php

class PsicologosC{

	//Ver Perfil Psicologo
	public function VerPerfilPsicologoC(){

		$tablaBD = "psicologos";

		if ($_SESSION["rol"] == "Psicologo") {
			
			$id = $_SESSION["id"];

		}else if ($_SESSION["rol"] == "Administrador") {
			
			$id = substr($_GET["url"], 17);

		}


		$resultado = PsicologosM::VerPerfilPsicologoM($tablaBD, $id);

		echo '<form">
				
		<div class="form-group">
					<a href="http://localhost/psicologiaitsur/perfil-P/'.$resultado["id"].'">
						<button class=" btn btn-lg btn-success"><i class="fa fa-pencil"> Editar</i></button>
					</a>
				</div>
					
		<div class="row">
			
			<div class="col-md-6 col-xs-12">
				
				<h2>Nombre:</h2>
				<h3>'.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h2>
				<input type="hidden" name="Aid" value="'.$resultado["id"].'">

				<h2>Correo Electronico:</h2>
				<h3>'.$resultado["correo"].'</h2>

				<h2>Contraseña:</h2>
				<h3>'.$resultado["clave"].'</h2>

				<h2>Horario:</h2>
				<h3>'.$resultado["horarioE"].' a '.$resultado["horarioS"].' hrs.</h2>

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

	//Editar Perfil Psicologo (Psicologo)
	public function EditarPerfilPsicologoC(){

		$tablaBD = "psicologos";
		if ($_SESSION["rol"] == "Psicologo") {
			
			$id = $_SESSION["id"];

		}else if ($_SESSION["rol"] == "Administrador") {
			
			$id = substr($_GET["url"], 9);

		}

		$resultado = PsicologosM::VerPerfilPsicologoM($tablaBD, $id);

		echo '<form method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							
							<h2>Nombre:</h2>
							<input type="text" class="input-lg" name="nombreP" value="'.$resultado["nombre"].'">
							<input type="hidden" name="Pid" value="'.$resultado["id"].'">	

							<h2>Apellido Paterno:</h2>
							<input type="text" class="input-lg" name="apellidopaternoP" value="'.$resultado["apellidopaterno"].'">

							<h2>Apellido Materno:</h2>
							<input type="text" class="input-lg" name="apellidomaternoP" value="'.$resultado["apellidomaterno"].'">
					
							<h2>Correo Electronico:</h2>
							<input type="text" class="input-lg" name="correoP" value="'.$resultado["correo"].'">

							<h2>Contraseña:</h2>
							<input type="text" class="input-lg" name="claveP" value="'.$resultado["clave"].'">

							<h2>Horarios</h2>

							<div class="row">
								<div class="col-lg-6">
									<div class="input-group">
										<h3>Entrada</h3>
										<input type="text" class="input-lg timepicker" name="timehorarioE" id="timehorarioE" value="'.$resultado["horarioE"].'">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="input-group">
										<h3>Salida</h3>
										<input type="text" class="input-lg timepicker" name="timehorarioS" id="timehorarioS" value="'.$resultado["horarioS"].'">
									</div>
								<!-- /input-group -->
								</div>
								<!-- /.col-lg-6 -->
							</div>

							

							

						</div>


						<div class="col-md-6 col-xs-12">
							
							<br><br>

							<input type="file" name="imgP">
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

	//Actualizar Perfil Psicologo (Psicologo)
	public function ActualizarPerfilPsicologoC(){

		if(isset($_POST["Pid"])){

			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgP"]["tmp_name"]) && !empty($_FILES["imgP"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}


				if($_FILES["imgP"]["type"] == "image/png"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Psicologos/Ps-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgP"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

				if($_FILES["imgP"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Psicologos/Ps-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgP"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

			}

			$tablaBD = "psicologos";

			$datosC = array("id"=>$_POST["Pid"], "nombre"=>$_POST["nombreP"], "apellidopaterno"=>$_POST["apellidopaternoP"], "apellidomaterno"=>$_POST["apellidomaternoP"], "correo"=>$_POST["correoP"], "clave"=>$_POST["claveP"], "foto"=>$rutaImg, "horarioE"=>(''.$_POST["timehorarioE"].':00'), "horarioS"=>(''.$_POST["timehorarioS"].':00'));

			$resultado = PsicologosM::ActualizarPerfilPsicologoM($tablaBD, $datosC);

			if($resultado == true){

				if ($_SESSION["rol"] == "Psicologo") {
					
					echo '<script>
					window.location = "http://localhost/psicologiaitsur/perfil-'.$_SESSION["rol"].'";
					</script>';

				}else if ($_SESSION["rol"] == "Administrador"){

					echo '<script>
					window.location = "http://localhost/psicologiaitsur/psicologos";
					</script>';

				}

			}

		}

	}

	//Borrar Psicologo
	public function BorrarPsicologoC(){

		if(isset($_GET["Pid"])){

			$tablaBD = "psicologos";

			$id = $_GET["Pid"];

			if($_GET["imgP"] != ""){

				unlink($_GET["imgP"]);

			}

			$resultado = PsicologosM::BorrarPsicologoM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "psicologos";
				</script>';

			}

		}

	}

	//Mostrar Psicologo
	static public function VerPsicologosC($columna, $valor){
		
		$tablaBD = "psicologos";

		$resultado = PsicologosM::VerPsicologosM($tablaBD, $columna, $valor);

		return $resultado;


	}

	//Mostrar Calendario Psicologo
	static public function PsicologoC($columna, $valor){

		$tablaBD = "psicologos";

		$resultado = PsicologosM::PsicologoM($tablaBD, $columna, $valor);

		return $resultado;

	}

	//Crear Psicologos
	public function CrearPsicologoC(){

		if(isset($_POST["rolP"])){
			if ($_POST["rolP"] == "Psicologo") {
				$tablaBD = "psicologos";
				$hora = "07:00:00";
				$datosC = array("nombre"=>$_POST["registronombre"], "apellidopaterno"=>$_POST["registroapaterno"], "apellidomaterno"=>$_POST["registroamaterno"], "sexo"=>$_POST["sexoAlumno"], "horarioE"=>$hora, "horarioS"=>$hora, "correo"=>$_POST["registrocorreo"], "clave"=>$_POST["registrocontrasena"], "rol"=>$_POST["rolP"]);
				$resultado = PsicologosM::CrearPsicologoM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "psicologos";
					</script>';

				}	
			}
		}
	}

}