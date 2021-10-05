<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Llenar Tramite de Cita
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  
                  <?php
                  $tabla="alumnos";
                  $resultado = AlumnosM::VerPerfilAlumnoM($tabla, $_SESSION["idAlumno"]);
                  echo '<h3>Nombre: '.$resultado["nombre"].' '.$resultado["apellidopaterno"].' '.$resultado["apellidomaterno"].'</h3>
                  <h3>Sexo: '.$resultado["sexo"].'</h3>';

                  list($anio, $mes, $dia) = explode("-", $resultado["fechaN"]);
                  $aniodif  = date("Y") - $anio;
                  $mes_dif = date("m") - $mes;
                  $dia_dif   = date("d") - $dia;
                  if ($dia_dif < 0 || $mes_dif < 0) $aniodif;
                  
                  echo '<h3>Edad: '.$aniodif.'</h3>
                  <h3>Carrera: '.$resultado["carrera"].'</h3>';
                  
                  echo '<h3>Dia: '.$_SESSION["fechaL"].'</h3>
                  <h3>Hora: '.$_SESSION["horaB"].' hrs.</h3>';
                  ?>
                  
                </div>
                <!-- Pregunta 1
                <div class="form-group">
                  <h3 for="pre1">1.	¿Has Usado el Servicio de Tutorías?:</h3>
                  <div class="radio">
                    <label>
                      <input type="radio" name="radiop1" id="radiop1A" value="option1" onclick="preguntas('moti1A')">
                      Si
                    </label>
                  </div>
                  <div id="moti1A" style="display: none;">
                  <h4 for="pre1A">¿Para que lo Haz Utilizado?:</h4>
                  <textarea name="texto" placeholder="Motivo" name="pre1A" id="pre1A"></textarea>
                  </div>          
                  <div class="radio">
                    <label>
                      <input type="radio" name="radiop1" id="radiop1B" value="option2" onclick="preguntas('moti1B')">
                      No
                    </label>
                  </div>
                  <div id="moti1B" style="display: none;">
                  <h4 for="pre1B">¿Por que Motivo no lo Haz Utilizado?:</h4>
                  <textarea name="texto" placeholder="Motivo" name="pre1B" id="pre1B"></textarea>
                  </div>
                </div>
                 Pregunta 2
                <div class="form-group">
                  <h3 for="pre2">2.	¿Tienes alguna situación identificada en específico o una duda específica?:</h3>
                  <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="radiop2" id="radiop2A" value="option1" onclick="preguntas('moti2A')">Si
                      </label>
                    </div>
                    <div id="moti2A" style="display: none;">
                      <h4 for="pre2A">Describe la Situacion:</h4>
                      <textarea name="texto" placeholder="Motivo" name="pre2A" id="pre2A"></textarea>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="radiop2" id="radiop2B" value="option2" onclick="preguntas('moti2B')">No
                      </label>
                    </div>
                  </div>
                </div>
                 Pregunta 3
                <div class="form-group">
                  <h3 for="pre3">3.	¿Te gustaría recibir orientación para conseguir un bienestar académico y emocional?:</h3>
                  <div class="form-group">
                  <div class="radio">
                      <label>
                        <input type="radio" name="radiop3" id="radiop3A" value="option1">Si</label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="radiop3" id="radiop3B" value="option2">No
                      </label>
                    </div>
                  </div>
                </div>
                 Pregunta 4
                <div class="form-group">
                  <h3 for="pre4">4.	¿Tienes un rendimiento académico que podría mejorar?:</h3>
                  <div class="form-group">
                  <div class="radio">
                      <label>
                        <input type="radio" name="radiop4" id="radiop4A" value="option1">Si</label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="radiop4" id="radiop4B" value="option2">No
                      </label>
                    </div>
                  </div>
                </div>      
                 Pregunta 5
                <div class="form-group">
                  <h3 for="pre5">5. Mis problemas son:</h3>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop5A">
                      a.Familiares
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop5B">
                      b.De pareja
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop5C">
                      c.Económicos 
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop5D">
                      d.En la escuela
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop5E">
                      e.Laborales 
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop5F">
                      f.En el trabajo
                    </label>
                  </div>

                </div>
                 Pregunta 6
                <div class="form-group">
                  <h3 for="pre6">6. La situación de mis problemas es:</h3>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6A">
                      a.Agresión (de un superior jerárquico)
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6B">
                      b.Bullying (agresión de iguales)
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6C">
                      c.Depresión  
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6D">
                      d.Ansiedad 
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6E">
                      e.Médicos (trastornos psicológicos medicados o corporales) 
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6F">
                      f.Adicción (de cualquier tipo)
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6G">
                      g.Desorientación (educativa, sexual, personal)
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" id="radiop6G">
                      h.Indiferenciado (ignoro lo que me sucede)
                    </label>
                  </div>

                </div>
                 Pregunta 7
                <div class="form-group">
                  <h3 for="pre7">7.	¿He buscado algún tipo de ayuda?</h3>
                  <div class="form-group">
                  <div class="radio">
                      <label>
                        <input type="radio" name="radiop7" id="radiop7A" value="option1">Si</label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="radiop7" id="radiop7B" value="option2">No
                      </label>
                    </div>
                  </div>
                </div>
                 Pregunta 8
                <div class="form-group">
                  <h3 for="pre8">8.	¿Te gustaría recibir ayuda en nuestra universidad? </h3>
                  <div class="form-group">
                  <div class="radio">
                      <label>
                        <input type="radio" name="radiop8" id="radiop8A" value="option1">Si</label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="radiop8" id="radiop8B" value="option2">No
                      </label>
                    </div>
                  </div>
                </div>  
              </div>
               /.box-body -->
              <div class="box-footer">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Enviar Cita</button>
              </div>
              
              
            </form>
          </div>
        
    </section>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      </div>
      <div class="modal-body">
      <?php

          $columna = "id";
          $valor = substr($_GET["url"], 11);

          $resultado = PsicologosC::PsicologoC($columna, $valor);

          echo '<div class="form-group">

                <input type="text" name="Pid" value="'.$resultado["id"].'">
                
              </div>';

              if (isset($_POST["Pid"])) {
                $enviar = new CitasC();
                $enviar -> EnviarCitaC($valor); 
              }
              
            
              
          ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Agendar Cita</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </form>
    </div>
  </div>
</div>