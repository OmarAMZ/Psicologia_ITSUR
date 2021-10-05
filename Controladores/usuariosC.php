<?php

class UsuariosC{

	//Ingreso Usuarios
	public function IngresarUsuarioC(){
		
		if(isset($_POST["correo-Ing"])){

			if(preg_match('/^[a-zA-Z0-9@.]+$/', $_POST["correo-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

				if ($_POST["tipodeusuario"] == "Alumno") {
					$tablaBD = "alumnos";
					$datosC = array("correo"=>$_POST["correo-Ing"], "clave"=>$_POST["clave-Ing"]);

					$resultado = UsuariosM::IngresarUsuarioM($tablaBD, $datosC);

					if($resultado["correo"] == $_POST["correo-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){


						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] = $resultado["id"];
						$_SESSION["correo"] = $resultado["correo"];
						$_SESSION["clave"] = $resultado["clave"];
						$_SESSION["apellidopaterno"] = $resultado["apellidopaterno"];
						$_SESSION["apellidomaterno"] = $resultado["apellidomaterno"];
						$_SESSION["nombre"] = $resultado["nombre"];
						$_SESSION["foto"] = $resultado["foto"];
						$_SESSION["sexo"] = $resultado["sexo"];
						$_SESSION["noControl"] = $resultado["noControl"];
						$_SESSION["carrera"] = $resultado["carrera"];
						$_SESSION["fechaN"] = $resultado["fechaN"];
						$_SESSION["rol"] = $resultado["rol"];

						echo '<script>

						window.location = "inicio";
						</script>';
					
					}else{
						echo 'Error al Ingresar';
					}

				}else if ($_POST["tipodeusuario"] == "Psicologo") {
					$tablaBD = "psicologos";
					$datosC = array("correo"=>$_POST["correo-Ing"], "clave"=>$_POST["clave-Ing"]);

					$resultado = UsuariosM::IngresarUsuarioM($tablaBD, $datosC);

					if($resultado["correo"] == $_POST["correo-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){


						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] = $resultado["id"];
						$_SESSION["correo"] = $resultado["correo"];
						$_SESSION["clave"] = $resultado["clave"];
						$_SESSION["apellidopaterno"] = $resultado["apellidopaterno"];
						$_SESSION["apellidomaterno"] = $resultado["apellidomaterno"];
						$_SESSION["nombre"] = $resultado["nombre"];
						$_SESSION["foto"] = $resultado["foto"];
						$_SESSION["sexo"] = $resultado["sexo"];
						$_SESSION["horarioE"] = $resultado["horarioE"];
						$_SESSION["horarioS"] = $resultado["horarioS"];
						$_SESSION["rol"] = $resultado["rol"];

						echo '<script>

						window.location = "inicio";
						</script>';
					}else{
						echo 'Error al Ingresar';
					}
		 		}

			}

		}

	}

}