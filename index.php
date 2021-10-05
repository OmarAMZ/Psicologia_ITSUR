<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/adminC.php";
require_once "Modelos/adminM.php";

require_once "Controladores/psicologosC.php";
require_once "Modelos/psicologosM.php";

require_once "Controladores/alumnosC.php";
require_once "Modelos/alumnosM.php";

require_once "Controladores/citasC.php";
require_once "Modelos/citasM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();