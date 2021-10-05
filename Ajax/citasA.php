<?php

require_once "../Controladores/citasC.php";
require_once "../Modelos/citasM.php";

class CitasA{
    
    public $fechacancelar;
    public $horacancelar;

	public function CancelarCitaAutomaticamenteA(){
        
		$valorfecha = $this->fechacancelar;
        $valorhora = $this->horacancelar;

        $resultado = CitasC::FinalizarCitasAC($valorfecha, $valorhora);
	}
}

if(isset($_POST["fechax"])){

    $cancelarc = new CitasA();
	$cancelarc -> fechacancelar = $_POST["fechax"];
    $cancelarc -> horacancelar = $_POST["horax"];
	$cancelarc -> CancelarCitaAutomaticamenteA();

}
?>