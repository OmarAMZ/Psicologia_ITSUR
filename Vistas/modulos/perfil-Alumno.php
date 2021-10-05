<?php

if($_SESSION["rol"] != "Alumno" && $_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;

}

?>

<div class="content-wrapper">

	<section class="content-header">
		
		<h1>Gestor de Perfil</h1>

	</section>


	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<?php
					$perfil = new AlumnosC();
					$perfil -> VerPerfilAlumnoC();
				
				?>

			</div>

		</div>

	</section>

</div>