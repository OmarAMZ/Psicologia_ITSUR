<?php

session_destroy();

echo '<script>
'.$_SESSION["Ingresar"] = false.'
	window.location = "iniciar-sesion";
</script>';