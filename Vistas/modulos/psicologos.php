<?php

if ($_SESSION["rol"] != "Administrador") {
    
    echo '<script>
    
    window.location="inicio";
    </script>';

    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>Gestor de Psicólogos</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">
				
				<a type="button" href="http://localhost/psicologiaitsur/registro-Psicologo" class="btn btn-primary btn-lg">Crear Psicólogo</a>
            
            </div>

            <div class="box-body">
            
				<table class="table table-bordered table-hover table-striped dt-responsive DT">
                
                    <thead>

                        <tr>
                        
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
							<th>Nombre</th>
                            <th>Foto</th>
                            <th>Correo Electrónico</th>
                            <th>Editar/Borrar</th>
                        
                        </tr>
                    
                    </thead>

                    <tbody>

                    <?php

                    $columna = null;
                    $valor = null;
                    
                    $resultado = PsicologosC::VerPsicologosC($columna, $valor);

                    foreach ($resultado as $key => $value) {

						
						echo '<tr>
						 
                                    <td>'.$value["apellidopaterno"].'</td>
                                    <td>'.$value["apellidomaterno"].'</td>
									<td>'.$value["nombre"].'</td>';

                                    if($value["foto"] == ""){

                                        echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';
    
                                    }else{
    
                                        echo '<td><img src="'.$value["foto"].'" width="40px"></td>';
    
                                    }
                                    
                                    echo '<td>'.$value["correo"].'</td>

                                    <td>
                                        
                                        <div class="btn-group">
                                                                                    
                                        <a class="btn btn-success" href="http://localhost/psicologiaitsur/perfil-Psicologo/'.$value["id"].'"><i class="fa fa-pencil"></i>Editar</a>
                                            
                                        </div>
                                        
                                        <div class="btn-group">
                                            
										<button class="btn btn-danger EliminarPsicologo" Pid="'.$value["id"].'" imgP="'.$value["foto"].'"><i class="fa fa-times"></i> Borrar</button>';
                                            
                                        echo '</div>

                                    </td>

                        </tr>';

                    }

                    ?>                   
                    
                    </tbody>
                
                </table>
            
            </div>
        
        </div>
    
    </section>

</div>

<!-- <div class="modal fade" rol="dialog" id="CrearPsicologo">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" name="apellido" required>

							<input type="hidden" name="rolP" value="Paciente">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="nombre" required>

						</div>

                        <div class="form-group">
							
							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" name="documento" required>

						</div>
						
						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" id="usuario" name="usuario" required>

						</div>

						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" name="clave" required>

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				//$crear = new PacientesC();
				//$crear -> CrearPacienteC();

				?>

			</form>

		</div>

	</div>

</div> -->

<!-- <div class="modal fade" rol="dialog" id="EditarPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" id="apellidoE" name="apellidoE" required>

							<input type="hidden" id="Pid" name="Pid">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" id="nombreE" name="nombreE" required>

						</div>

                        <div class="form-group">
							
							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" id="documentoE" name="documentoE" required>

						</div>

						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" id="usuarioE" name="usuarioE" required>

						</div>

						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" id="claveE" name="claveE" required>

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				//$actualizar = new PacientesC();
				//$actualizar -> ActualizarPacienteC();

				?>

			</form>

		</div>

	</div>

</div> -->

<?php

	$borrarP = new PsicologosC();
	$borrarP -> BorrarPsicologoC();

?>
