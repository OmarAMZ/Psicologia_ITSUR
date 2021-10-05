$(".DT").DataTable({

    "language": {

        "sSearch": "Buscar:",
        "sEmpty": "No hay Datos",
        "sZeroRecords": "No se Encontraron Resultados",
        "sInfo": "Mostrando Registros del _START_ al _END_ de un Total de _TOTAL_",
        "sInfoEmty": "Mostrando Registros del 0 al 0 de un Total de 0",
        "sInfoFiltered": "(Filtrado de un Total de _MAX_ Registros)",
        "oPaginate": {

            "sFirst": "Primero",
            "sLast": "Ultimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },

        "sLoadingRecords": "Cargando...",
        "sLengthMenu": "Mostrar _MENU_ Registros"


    }

})

$(".DT").on("click", ".EliminarPsicologo", function(){

	var Pid = $(this).attr("Pid");
	var imgP = $(this).attr("imgP");

	window.location = "index.php?url=psicologos&Pid="+Pid+"&imgP="+imgP;

})