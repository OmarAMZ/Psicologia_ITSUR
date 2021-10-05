<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>
<body>
  <form method="post">
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Registro de Alumnos</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">                
                            <div class="form-group">
                                <label for="registronombre">Nombre:</label>
                                <input type="text" class="form-control" id="registronombre" name="registronombre" placeholder="Ingresa Nombre">
                            </div>
                            <div class="form-group">
                                <label for="registroapaterno">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="registroapaterno" name="registroapaterno" placeholder="Ingresa Apellido Paterno">
                            </div>
                            <div class="form-group">
                                <label for="registroamaterno">Apellido Materno:</label>
                                <input type="text" class="form-control" id="registroamaterno" name="registroamaterno" placeholder="Ingresa Apellido Materno">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Sexo:</label>
                                        <select class="form-control" id="sexoAlumno" name="sexoAlumno">
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de Nacimiento:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="registrofnacimiento" name="registrofnacimiento">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="registronocontrol">Número de Control:</label>
                                        <input type="text" class="form-control" id="registronocontrol" name="registronocontrol" placeholder="Ingresa Número de Control">
                                    </div>  
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Carrera:</label>
                                        <select class="form-control" id="registrocarrera" name="registrocarrera">
                                            <option>Seleccionar...</option>
                                            <option>Gastronomía</option>
                                            <option>Ing. Sistemas Automotrices</option>
                                            <option>Ing. Ambiental</option>
                                            <option>Ing. Sistemas Computacionales</option>
                                            <option>Ing. Industrial</option>
                                            <option>Ing. Electrónica</option>
                                            <option>Ing. Gestión Empresarial</option>
                                            <option>Ing. Informática</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="registrocorreo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="registrocorreo" name="registrocorreo" placeholder="Ingresa Correo Electrónico">
                            </div>
                            <div class="form-group">
                                <label for="registrocontrasena">Contraseña:</label>
                                <input type="password" class="form-control" id="registrocontrasena" name="registrocontrasena" placeholder="Ingresa Contraseña">
                                <input type="hidden" name="rolP" value="Alumno">
                            </div>
                            <div class="form-group">
                                <a type="button" href="http://localhost/psicologiaitsur" class="btn btn-default">Cancelar</a>
                                <input type="submit" class="btn btn-info pull-right" name = "Registrars" value="Registrarse"></input>
                            </div>
                        </div>
                        <?php
                        $registros = new AlumnosC();
                        $registros -> CrearAlumnoC();
                        ?>
                    </div>
                </div>
            </div>
        </section>
  </form>     
  <!-- jQuery 3 -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(function () {
    //Date picker
    $('#registrofnacimiento').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    })
  })
</script>

</body>
</html>