<?php

if($_SESSION["rol"] != "Psicologo" && $_SESSION["rol"] != "Administrador"){

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
				
				$perfil = new PsicologosC();
				$perfil -> VerPerfilPsicologoC();

				?>

			</div>

		</div>

	</section>

</div>