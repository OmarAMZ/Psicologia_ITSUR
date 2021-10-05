$(".DT").on("click", ".EditarAlumno", function(){

	var Aid = $(this).attr("Aid");
	
	var datos = new FormData();

	datos.append("Aid", Aid);
	
	
	$.ajax({
		url: "Ajax/alumnosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		/*success: function(resultado){

			$("#Aid").val(resultado["id"]);
			
		}*/

	})

})