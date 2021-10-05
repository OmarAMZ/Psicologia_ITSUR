<?php

class AdminC{

	//Ver Perfil Administrador
	public function VerPerfilAdminC(){

		$tablaBD = "psicologos";

		$id = $_SESSION["id"];
		
		$resultado = AdminM::VerPerfilAdminM($tablaBD, $id);
		
		echo '<form">
				
		<div class="form-group">
					<a href="http://localhost/psicologiaitsur/perfil-A/'.$resultado["id"].'">
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

	//Editar Perfil Administrador
	public function EditarPerfilAdminC(){

		$tablaBD = "psicologos";
		$id = $_SESSION["id"];

		$resultado = AdminM::VerPerfilAdminM($tablaBD, $id);

		echo '<form method="post" enctype="multipart/form-data">
					
					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							
							<h2>Nombre:</h2>
							<input type="text" class="input-lg" name="nombreA" value="'.$resultado["nombre"].'">
							<input type="hidden" name="Aid" value="'.$resultado["id"].'">	

							<h2>Apellido Paterno:</h2>
							<input type="text" class="input-lg" name="apellidopaternoA" value="'.$resultado["apellidopaterno"].'">

							<h2>Apellido Materno:</h2>
							<input type="text" class="input-lg" name="apellidomaternoA" value="'.$resultado["apellidomaterno"].'">

							<h2>Correo Electronico:</h2>
							<input type="text" class="input-lg" name="correoA" value="'.$resultado["correo"].'">

							<h2>Contraseña:</h2>
							<input type="text" class="input-lg" name="claveA" value="'.$resultado["clave"].'">

						</div>


						<div class="col-md-6 col-xs-12">
							
							<br><br>

							<input type="file" name="imgA">
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

	//Actualizar Perfil Administrador
	public function ActualizarPerfilAdminC(){

		if(isset($_POST["Aid"])){

			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgA"]["tmp_name"]) && !empty($_FILES["imgA"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}


				if($_FILES["imgA"]["type"] == "image/png"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Administradores/A-".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["imgA"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}

				if($_FILES["imgA"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100,999);

					$rutaImg = "Vistas/img/Administradores/A-".$nombre.".jpg";

					$foto = imagecreatefromjpeg($_FILES["imgA"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);

				}

			}

			$tablaBD = "psicologos";

			$datosC = array("id"=>$_POST["Aid"], "nombre"=>$_POST["nombreA"], "apellidopaterno"=>$_POST["apellidopaternoA"], "apellidomaterno"=>$_POST["apellidomaternoA"], "correo"=>$_POST["correoA"], "clave"=>$_POST["claveA"], "foto"=>$rutaImg);

			$resultado = AdminM::ActualizarPerfilAdminM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/psicologiaitsur/perfil-'.$_SESSION["rol"].'";
				</script>';

			}

		}

	}

}