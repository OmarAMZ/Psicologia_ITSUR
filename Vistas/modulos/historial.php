<?php

if($_SESSION["rol"] != "Psicologo" && $_SESSION["rol"] != "Alumno" && $_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;

}


?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Historial de Citas</h1>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped DT">
					
					<thead>
						
						<tr>
							
							<th>Fecha y Hora</th>
							<th>Psicologo</th>
							<th>Estatus</th>
							<th></th>

						</tr>

					</thead>

					<tbody>

						<?php
						if ($_SESSION["rol"] == "Alumno") {
							$resultado = CitasC::VerHistorialCitasC($_SESSION["id"]);	
						}
						if ($_SESSION["rol"] == "Psicologo" || $_SESSION["rol"] == "Administrador") {
							$id = substr($_GET["url"], 10);
							$resultado = CitasC::VerHistorialCitasC($id);	
						}

						foreach ($resultado as $key => $value) {
							
								echo '<tr>

									<td>'.$value["fechayhoraI"].'</td>';

									$columna = "id";
									$valor = $value["id_psicologo"];

									$psicologo = PsicologosC::PsicologoC($columna, $valor);

									echo '<td>'.$psicologo["nombre"].' '.$psicologo["apellidopaterno"].'</td>';

									
									echo '<td>'.$value["estatus"].'</td>
                                    <td>';

									if ($value["estatus"] == "Agendada") {
										echo '
										<div class="btn-group">
																					
										<button class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</button>
											
										</div>';
									}

									echo '</td>';

								echo '</tr>';
							

						}

						?> 
						

					</tbody>

				</table>

			</div>

		</div>

	</section>

</div>

