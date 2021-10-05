<?php

if ($_SESSION["rol"] != "Administrador") {
    
    echo '<script>
    
    window.location="inicio";
    </script>';

    return;
}

?>

<div class="content-wrapper">
    <form method="post">
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Registro de Psicólogos</h3>
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
                                            <option>Seleccionar...</option>
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">            
                            <div class="form-group">
                                <label for="registrocorreo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="registrocorreo" name="registrocorreo" placeholder="Ingresa Correo Electrónico">
                            </div>
                            <div class="form-group">
                                <label for="registrocontrasena">Contraseña:</label>
                                <input type="password" class="form-control" id="registrocontrasena" name="registrocontrasena" placeholder="Ingresa Contraseña">
                                <input type="hidden" name="rolP" value="Psicologo">
                            </div>
                            <div class="form-group">
                                <a type="button" href="http://localhost/psicologiaitsur" class="btn btn-default">Cancelar</a>
                                <input type="submit" class="btn btn-info pull-right" name = "Registrars" value="Registrarse"></input>
                            </div>
                        </div>
                        <?php
                        $registroPsicologo = new PsicologosC();
                        $registroPsicologo -> CrearPsicologoC();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </form>             
</div>

