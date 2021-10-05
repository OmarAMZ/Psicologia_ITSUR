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
		
		<?php

		$columna = "id";
		$valor = substr($_GET["url"],10);

		$resultado = PsicologosC::PsicologoC($columna, $valor);

		if ($resultado["sexo"] == "Femenino") {
			
			echo '<h1>Psicóloga: '.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h1>';

		}else{

			echo '<h1>Psicólogo: '.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h1>';

		}
		
		?>
               
	</section>

	<section class="content">
		
		<div class="box">
						
			<div class="box-body">
				
				<div id="calendar"></div>
               
			</div>

		</div>

	</section>

</div>

<div class="modal fade" rol="dialog" id="PedirCitaModal">
	
	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post">

				<div class="modal-body">

					<div class="box-body">

						<?php

						$columna = "id";
						$valor = substr($_GET["url"], 10);

						$resultado = PsicologosC::PsicologoC($columna, $valor);

						echo '<div class="form-group">

									<h2>¿Quieres Realizar una Cita este Dia?</h2>
									<div class="form-group">
										<div class="input-group">
											<h3><label>Día:</label></h3>
											<h3 id="diaCitax" name="diaCitax"><h3>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<h3><label>Hora:</label></h3>
											<h3 id="horaCitax" name="horaCitax"><h3>
										</div>
									</div>
									<input type="hidden" class="form-control input-lg" id="fechaC" name="fechaC" value="" readonly>
									<input type="hidden" class="form-control input-lg" id="horaC" name="horaC" value="" readonly>

									<input type="hidden" class="form-control input-lg" id="fyhIC" name="fyhIC" value="" readonly>
									<input type="hidden" class="form-control input-lg" id="fyhFC" name="fyhFC" value="" readonly>
									<input type="hidden" name="Pid" value="'.$resultado["id"].'">

								</div>';					
						  
								
						?>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Agendar Cita</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php
				if (isset($_POST["Pid"])) {
					$datosG = new CitasC();
					$datosG -> GuardarDatosAlumnoC($_POST["fechaC"], $_POST["horaC"], $_POST["fyhIC"], $_POST["fyhFC"],$valor); 
				}
				?>

			</form>

		</div>
	
	</div>

</div>