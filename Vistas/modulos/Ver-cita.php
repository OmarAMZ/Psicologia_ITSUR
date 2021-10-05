<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cita del Alumno(a)
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <?php

              $columna = "id";
              $valor = substr($_GET["url"],9);
              $resultadocita = CitasC::CitaC($columna, $valor);
              $resultado = AlumnosC::AlumnoC($resultadocita["id_alumno"]);

              if ($resultadocita["estatus"] == "Agendada") {
                echo '<div class="pull-right">
                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#ModalCancelarCita">Cancelar Cita</button>
                <button type="submit" class="btn btn-success">Finalizar Cita</button>
              </div>';
              }
             
              ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  
                  <?php
                  
                  echo '<h3>Nombre: '.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h3>
                  <h3>Sexo: '.$resultado["sexo"].'</h3>';

                  list($anio, $mes, $dia) = explode("-", $resultado["fechaN"]);
                  $aniodif  = date("Y") - $anio;
                  $mes_dif = date("m") - $mes;
                  $dia_dif   = date("d") - $dia;
                  if ($dia_dif < 0 || $mes_dif < 0) $aniodif;
                  
                  echo '<h3>Edad: '.$aniodif.'</h3>
                  <h3>Carrera: '.$resultado["carrera"].'</h3>';
                  /*Tranformacion de Fecha a letras*/
            
                  $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
                  $dia = $dias[date('w', strtotime($resultadocita["fechaI"]))];
                  $num = date("j", strtotime($resultadocita["fechaI"]));
                  $meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
                  $mes = $meses[(date('m', strtotime($resultadocita["fechaI"]))*1)-1];
                  $anno = date("Y", strtotime($resultadocita["fechaI"]));
                  $fechaletra= $dia.', '.$num.' de '.$mes.' del '.$anno;;    

                  ///////////////////////////////////
                  echo '<h3>Dia: '.$fechaletra.'</h3>
                  <h3>Hora: '.$resultadocita["horai"].' hrs.</h3>';
                  ?>         
                </div>
              <div class="box-footer">
              </div>
              
              
            </form>
          </div>
        
    </section>

</div>

<!-- Modal Cancelar Cita -->
<div class="modal fade" id="ModalCancelarCita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
				</div>
				<div class="modal-body">
					<h2>Desea Cancelar la Cita?</h2>
          <h4>(Una vez cancelada no se podra volver a activar denuevo)</h4>

          <?php
          $valor = substr($_GET["url"],9);
          echo '<input type="text" class="form-control pull-right" id="idCancelarCi" name="idCancelarCi" value="'.$valor.'">';
          ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-danger">Si</button>
				</div>
				<?php
				
				if (isset($_POST["idCancelarCi"])) {
					$cancelar = new CitasC();
					$cancelar -> CancelarCitasC($_POST["idCancelarCi"]); 
				}
				?>
			</form>
		</div>
  	</div>
</div>