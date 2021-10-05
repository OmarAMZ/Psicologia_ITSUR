<?php

if($_SESSION["rol"] != "Psicologo" && $_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "inicio";
	</script>';

	return;

}

?>

<div class="content-wrapper">

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">

				<?php

				$editarPerfil = new PsicologosC();
				$editarPerfil -> EditarPerfilPsicologoC();
				$editarPerfil -> ActualizarPerfilPsicologoC();

				?>
				
				

			</div>

		</div>

	</section>

</div>

<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery/dist/jquery.min.js"></script>

<script>
$(function () {

	$('#timehorarioE').timepicker({
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
	
	$('#timehorarioS').timepicker({
		timeFormat: 'H:i',
		step: 60,
	    minTime: '7',
	    maxTime: '20:00',
	    defaultTime: '9',
	    startTime: '00:00',
	    dynamic: false,
	    dropdown: true,
	    scrollbar: true
	});


});
</script>