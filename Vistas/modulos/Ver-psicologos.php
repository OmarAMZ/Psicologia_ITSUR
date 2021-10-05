<?php

if($_SESSION["rol"] != "Alumno"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;

}


?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Elija un Psicologo(a)</h1>

	</section>

	<section class="content">
		
		<div class="box">
						
			<div class="box-body">

			<?php

			$columna = null;
			$valor = null;

			$resultado = PsicologosC::VerPsicologosC($columna, $valor);

			foreach ($resultado as $key => $value) {
				
				echo '<div class="row">
						<div class="col-md-4">

							<div class="box box-widget widget-user-2">
							
							<div class="widget-user-header bg-yellow">
								<div class="widget-user-image">';
								if($value["foto"] == ""){

									echo '<img class="img-circle" src="Vistas/img/defecto.png" alt="User Avatar">';

								}else{

									echo '<img class="img-circle" src="'.$value["foto"].'" alt="User Avatar">';

								}
								
								echo '</div>
								
								<h3 class="widget-user-username">'.$value["nombre"].'<br>'.$value["apellidopaterno"].' '.$value["apellidomaterno"].'</h3>';

								if ($value["sexo"] == "Femenino") {
									echo '<h5 class="widget-user-desc">Psicóloga</h5>';
								}else{
									echo '<h5 class="widget-user-desc">Psicólogo</h5>';
								}
								
							echo '</div>
							<div class="box-footer no-padding">
								<ul class="nav nav-stacked">
								<li><a href="Psicologo/'.$value["id"].'">Agendar Cita</a></li>
								</ul>
							</div>
						</div>
					</div>';

			}

			?>

			</div>

		</div>

	</section>

</div>