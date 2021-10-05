<?php

if($_SESSION["rol"] != "Psicologo"){

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
		$valor = substr($_GET["url"],6);

		$resultado = PsicologosC::PsicologoC($columna, $valor);

		if ($resultado["sexo"] == "Femenino") {
			
			echo '<h1>Psicóloga: '.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h1>';

		}else{

			echo '<h1>Psicólogo: '.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h1>';

		}
		
		?>
		
               
	</section>

	<section class="content">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalOpciones"><i class="fa fa-wrench"></i> Opciones</button>
		<div class="box">
						
			<div class="box-body">
				
				<div id="calendarpsicologo"></div>
               
			</div>

		</div>

	</section>

</div>

<!-- Modal Opciones -->
<div class="modal fade" id="ModalOpciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form>
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
		</div>
		<div class="modal-body">
			<a type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#ModalAñadirHoras" data-dismiss="modal">Añadir Horas Ocupadas</a>
		</div>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal Ver Citas -->
<div class="modal fade" id="ModalVerCitas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<label>Visualizacion de Cita.</label>
				</div>
				<div class="modal-body">
					<input type="hidden" class="form-control pull-right" id="idCitaA" name="idCitaA">
					<div class="form-group">
						<h3><label>Nombre del Alumno(a):</label></h3>
						<h3 id="nombreAlumno" name="nombreAlumno"><h3>
					</div>
					<div class="form-group">
						<div class="input-group">
							<h3><label>Tiene una Cita el Día:</label></h3>
							<h3 id="fechaCita" name="fechaCita"><h3>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Ver Cita</button>
				</div>
				<?php
				
				if (isset($_POST["idCitaA"])) {
					$VerCita = new CitasC();
					$VerCita -> VerCitaC($_POST["idCitaA"]); 
				}
				?>
			</form>
		</div>
  	</div>
</div>

<!-- Modal Eliminar Hora Libre -->
<div class="modal fade" id="ModalEliminarHora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
				</div>
				<div class="modal-body">
					<h1>Desea Elimiar Esta hora Ocupada?</h1>
					<div class="form-group">
						<div class="input-group">
							<h3 id="fechaEL" name="fechaEL"><h3>
							<h3 id="horaEL" name="horaEL"><h3>
							<input type="hidden" class="form-control pull-right" id="idhora" name="idhora">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Eliminar</button>
				</div>
				<?php
				
				if (isset($_POST["idhora"])) {
					$datosG = new CitasC();
					$datosG -> EliminarHoraLC($_POST["idhora"]); 
				}
				?>
			</form>
		</div>
  	</div>
</div>

<!-- Modal Opciones Añadir Horas Libres -->
<div class="modal fade" id="ModalAñadirHoras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><label>Añadir Horas Ocupadas</label></h5>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Añade el Rango de Horas Ocupadas que Seran bloqueadas del Calendario</label><br>
						<small>Nota: Puedes despues Eliminar esas Horas.</small>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="input-group">
								<label>Fecha de inicio:</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="fechaInicio" name="fechaInicio">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
								<label>Fecha de Finalización:</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="fechaFin" name="fechaFin">
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6">
							<div class="input-group">
								<label>Hora de Inicio</label>
								<div class="input-group">
									<input type="text" class="input-lg timepicker" name="timeHoraI" id="timeHoraI">
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
								<label>Hora de Finalización</label>
								<div class="input-group">
									<input type="text" class="input-lg timepicker" name="timeHoraF" id="timeHoraF">
								</div>
							</div>
						</div>
					</div>
					<?php
					$columna = "id";
					$valor = substr($_GET["url"], 6);
					$resultado = PsicologosC::PsicologoC($columna, $valor);
					echo '
					<input type="hidden" name="Pid" value="'.$resultado["id"].'">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Agregar Horas</button>
				</div>';
				
				if (isset($_POST["Pid"])) {
					$datosG = new CitasC();
					$datosG -> HorasLibresC($_POST["Pid"]); 
				}
				?>
			</form>
		</div>
  	</div>
</div>

<!-- Modal Pedir Cita(Psicologo) -->
<div class="modal fade" rol="dialog" id="ModalPedirCitaPsicologo">
	
	<div class="modal-dialog">

		<div class="modal-content">

			<form method="post">

				<div class="modal-body">

					<div class="box-body">

						<?php

						echo '<div class="form-group">

								<div class="form-group">
									
									<h2>Alumno(a):</h2>

									<select class="form-control input-lg" name="alumno">
										
										<option>Seleccionar...</option>';

										$columnaalumnos = null;
										$valoralumnos = null;

										$resultado2 = AlumnosC::VerAlumnosC($columnaalumnos, $valoralumnos);

										foreach ($resultado2 as $key => $value) {
											
											echo '<option value="'.$value["id"].'">'.$value["apellidopaterno"].' '.$value["apellidomaterno"].' '.$value["nombre"].' </option>';

										}

										$columna = "id";
										
										$valor = substr($_GET["url"], 6);

										$resultado = PsicologosC::PsicologoC($columna, $valor);
										echo '
									</select>

								</div>
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
									<input type="hidden" name="Psid" value="'.$resultado["id"].'">

								</div>';
								
						?>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Agendar Cita</button>

				</div>
				<?php
				if (isset($_POST["Psid"])) {
					$datosG = new CitasC();
					$datosG -> GuardarDatosPsicologoC($_POST["fechaC"], $_POST["horaC"], $_POST["fyhIC"], $_POST["fyhFC"], $_POST["alumno"],$valor); 
				}
				?>

			</form>

		</div>
	
	</div>

</div>

<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(function () {
    //Date picker
    $('#fechaInicio').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
	$('#fechaFin').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
	$('#timeHoraI').timepicker({
		timeFormat: 'H:i',
		step: 60,
		minTime: '7',
		maxTime: '20:00',
		defaultTime: '7',
		startTime: '00:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true,
	});
	$('#timeHoraF').timepicker({
		timeFormat: 'H:i',
		step: 60,
		minTime: '7',
		maxTime: '20:00',
		defaultTime: '7',
		startTime: '00:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true,
	});
  })
</script>