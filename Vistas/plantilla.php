<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PSICOLOGIA ITSUR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- FullCalender -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- DatePicker -->
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- TimePicker -->
  <!-- bootstrap timepicker -->
  <link rel="stylesheet" href="http://localhost/psicologiaitsur/Vistas/bower_components/jquery-timepicker/jquery.timepicker.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->


  <?php
 $url = array();
  if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {
   
    echo '<div class="wrapper">';

    include "modulos/cabecera.php";

    if ($_SESSION["rol"] == "Administrador") {

      include "modulos/menuAdmin.php";
    }else if ($_SESSION["rol"] == "Alumno") {

      include "modulos/menuAlumno.php";
    }else if ($_SESSION["rol"] == "Psicologo") {

      include "modulos/menuPsicologo.php";
    }
    
    $url = array();
    if (isset($_GET["url"])) {
        
      $url = explode("/", $_GET["url"]);
  
      if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Administrador" || $url[0] == "perfil-Psicologo" || $url[0] == "perfil-Alumno" || $url[0] == "perfil-A" || $url[0] == "perfil-Al" || $url[0] == "perfil-P" || $url[0] == "alumnos" || $url[0] == "psicologos" || $url[0] == "Ver-psicologos" || $url[0] == "Psicologo" || $url[0] == "formulario" || $url[0] == "historial" || $url[0] == "citas" || $url[0] == "registro-Psicologo" || $url[0] == "Ver-cita") {
          
          include "modulos/".$url[0].".php";
      
      }
      
    }else{
  
          include "modulos/inicio.php";

        }
  
      echo '</div>';
  
    }else if (isset($_GET["url"])) {
        
      if ($_GET["url"] == "iniciar-sesion") {
          
          include "modulos/iniciar-sesion.php";
  
        }else if ($_GET["url"] == "registro") {
          
          include "modulos/registro.php";
        
        }
    }else{
      include "modulos/iniciar-sesion.php";
    }

  ?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/psicologiaitsur/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/psicologiaitsur/Vistas/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- fullCalendar -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>

<!-- datepicker -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- timepicker -->
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery-timepicker/jquery.timepicker.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/bower_components/jquery-timepicker/jquery.timepicker.min.js"></script>



<script src="http://localhost/psicologiaitsur/Vistas/js/alumnos.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/js/psicologos.js"></script>
<script src="http://localhost/psicologiaitsur/Vistas/js/citas.js"></script>

<!-- Calendario Alumno -->
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  var date = new Date()
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()
    $('#calendar').fullCalendar({

      hiddenDays: [0,6], 

      defaultView: 'agendaWeek',
      events:[

        <?php

              $columna = null;
              $valor = null;

              $resultado = CitasC::VerCitasC();

              foreach ($resultado as $key => $value) {

                if($value["id_psicologo"] == substr($_GET["url"], 10)){

                  echo '{
                    id: '.$value["id"].',
                    title:  "Reservado",
                    start:"'.$value["fechayhoraI"].'",
                    end:"'.$value["fechayhoraF"].'"
                  },';

                }

              }
              $columna = null;
              $valor = null;

              $resultado = CitasC::VerHorasLC();

              foreach ($resultado as $key => $value) {

                if($value["id_psicologo"] == substr($_GET["url"], 10)){

                  echo '{
                    id: '.$value["id"].',
                    start:"'.$value["fechayhoraI"].'",
                    end:"'.$value["fechayhoraF"].'",
                    color: "#c5c6c8"
                  },';

                }

              }
              
            

        ?>

      ],

      <?php

      if($_SESSION["rol"] == "Alumno"){

        $columna = "id";
            $valor = substr($_GET["url"], 10);

            $resultado = PsicologosC::PsicologoC($columna, $valor);
            
            echo 'scrollTime: "'.$resultado["horarioE"].'",
                    minTime: "'.$resultado["horarioE"].'",
                    maxTime: "'.$resultado["horarioS"].'",';

      }else if($_SESSION["rol"] == "Psicologo"){

        $columna = "id";
        $valor = substr($_GET["url"], 6);

            $resultado = PsicologosC::PsicologoC($columna, $valor);
            
            echo 'scrollTime: "'.$resultado["horarioE"].'",
                    minTime: "'.$resultado["horarioE"].'",
                    maxTime: "'.$resultado["horarioS"].'",';

      }
      else if($_SESSION["rol"] == null){

      }
            
      ?>

      //Agendar Cita cuando se da clic
      dayClick:function(date,jsEvent,view){

        var fecha = date.format();

        var hora2 = ("01:00:00").split(":");

        fecha = fecha.split("T");

        var dia = fecha[0];

        var hora = (fecha[1]).split(":");

        var h1 = parseFloat(hora[0]);
        var h2 = parseFloat(hora2[0]);

        var horaFinal = h1+h2;

        $('#PedirCitaModal').modal();
    
        $('#fechaC').val(dia);
        
        $('#horaC').val(h1+":00");

        $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

        $('#fyhFC').val(fecha[0]+" "+horaFinal+":00:00");

        var diax = date.format('dddd DD');
        var mes = date.format('MMMM');
        var anio = date.format('YYYY');
        var horainicio = date.format('HH');
        var horafin1 = parseFloat(date.format('HH'));
        var horafin = horafin1 + 1 ;

        var fechax = diax + " de " + mes + " del " + anio + ".";
        var horax = "De " + horainicio + ":00 a " + horafin + ":00 hrs.";
        document.getElementById('diaCitax').innerHTML = fechax;
        document.getElementById('horaCitax').innerHTML = horax;
       
      }
      
    })

</script>

<!-- Calendario Psicologo -->
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  var date = new Date()
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()
    $('#calendarpsicologo').fullCalendar({

      hiddenDays: [0,6],
      header: {
        right: 'today agendaWeek,agendaDay prev,next,'
      },
      defaultView: 'agendaWeek',
      editable: true,
      events:[

        <?php

              $columna = null;
              $valor = null;

              $resultado = CitasC::VerCitasC();
              
              foreach ($resultado as $key => $value) {
                if($value["id_psicologo"] == substr($_GET["url"], 6)){
                  
                  echo '{
                    id: '.$value["id"].',
                    title:  "'.$value["nombre"].' '.$value["apellidopaterno"].' '.$value["apellidomaterno"].'",
                    start:"'.$value["fechayhoraI"].'",
                    end:"'.$value["fechayhoraF"].'",
                    "belongsto" : "lista Citas",
                  },';

                }

              }
              $columna = null;
              $valor = null;

              $resultado = CitasC::VerHorasLC();
              
              foreach ($resultado as $key => $value) {

                if($value["id_psicologo"] == substr($_GET["url"], 6)){

                  echo '{
                    id: '.$value["id"].',
                    start:"'.$value["fechayhoraI"].'",
                    end:"'.$value["fechayhoraF"].'",
                    color: "#c5c6c8",
                    "belongsto" : "lista horas"
                  },';

                }

              }
              
            

        ?>

      ],
      eventClick: function(calEvent, jsEvent, view) {
        
        if (calEvent.belongsto === "lista Citas") {

          $('#ModalVerCitas').modal();

          
          var dia = $.fullCalendar.formatDate(calEvent.start, 'dddd DD');
          var mes = $.fullCalendar.formatDate(calEvent.start, 'MMMM');
          var anio = $.fullCalendar.formatDate(calEvent.start, 'YYYY');
          var hora = " a las " + $.fullCalendar.formatDate(calEvent.start, 'HH:mm') + " hrs.";
          
          var fecha = dia + " de " + mes + " del " + anio + hora;
          
          document.getElementById('nombreAlumno').innerHTML = calEvent.title + ".";
          document.getElementById('fechaCita').innerHTML = fecha;

          $('#idCitaA').val(calEvent.id);
          
        }else if(calEvent.belongsto === "lista horas"){

          $('#ModalEliminarHora').modal();
          
          var dia = $.fullCalendar.formatDate(calEvent.start, 'dddd DD');
          var mes = $.fullCalendar.formatDate(calEvent.start, 'MMMM');
          var anio = $.fullCalendar.formatDate(calEvent.start, 'YYYY');

          var horainicio = $.fullCalendar.formatDate(calEvent.start, 'HH:mm');
          var horafin = $.fullCalendar.formatDate(calEvent.end, 'HH:mm');

          var fecha = dia + " de " + mes + " del " + anio + ".";
          var hora = "De " + horainicio + " a " + horafin + " hrs.";
          document.getElementById('fechaEL').innerHTML = fecha;
          document.getElementById('horaEL').innerHTML = hora;
          $('#idhora').val(calEvent.id);
        }
        
      },

      <?php

      if($_SESSION["rol"] == "Alumno"){

        $columna = "id";
            $valor = substr($_GET["url"], 10);

            $resultado = PsicologosC::PsicologoC($columna, $valor);
            
            echo 'scrollTime: "'.$resultado["horarioE"].'",
                    minTime: "'.$resultado["horarioE"].'",
                    maxTime: "'.$resultado["horarioS"].'",';

      }else if($_SESSION["rol"] == "Psicologo"){

        $columna = "id";
        $valor = substr($_GET["url"], 6);

            $resultado = PsicologosC::PsicologoC($columna, $valor);
            
            echo 'scrollTime: "'.$resultado["horarioE"].'",
                    minTime: "'.$resultado["horarioE"].'",
                    maxTime: "'.$resultado["horarioS"].'",';

      }
      else if($_SESSION["rol"] == null){

      }
            
      ?>

      //Agendar Cita cuando se da clic
      dayClick:function(date,jsEvent,view){
        
          var fecha = date.format();

          var hora2 = ("01:00:00").split(":");

          fecha = fecha.split("T");

          var dia = fecha[0];

          var hora = (fecha[1]).split(":");

          var h1 = parseFloat(hora[0]);
          var h2 = parseFloat(hora2[0]);

          var horaFinal = h1+h2;

          $('#ModalPedirCitaPsicologo').modal();
      
          $('#fechaC').val(dia);
          
          $('#horaC').val(h1+":00");

          $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

          $('#fyhFC').val(fecha[0]+" "+horaFinal+":00:00");

          
          var diax = date.format('dddd DD');
          var mes = date.format('MMMM');
          var anio = date.format('YYYY');
          var horainicio = date.format('HH');

          var horafin1 = parseFloat(date.format('HH'));

          var horafin = horafin1 + 1 ;

          var fechax = diax + " de " + mes + " del " + anio + ".";
          var horax = "De " + horainicio + ":00 a " + horafin + ":00 hrs.";
          document.getElementById('diaCitax').innerHTML = fechax;
          document.getElementById('horaCitax').innerHTML = horax;
          
       
      },
      
    })

</script>

<!-- Reloj -->
<script>

  var myVar = setInterval(function(){ myTimer() }, 1000);

  function myTimer() {

      var hora = new Date();

      var myhora = hora.toLocaleTimeString();
      
      var myfecha = hora.toLocaleDateString("sv-SE",{year: "numeric", month: "numeric", day: "numeric"});
      
      var h1 = hora.toLocaleTimeString([], {hour: '2-digit'});

      
      var hora7 = ""+h1+":15:00";

      if (myhora == hora7){
        
        var parametros = {"fechax":myfecha,"horax":hora7};
        
        $.ajax({
          data:parametros,
          url:'Ajax/citasA.php',
          type: 'post',
          
        });
      }

    }

</script>

</body>
</html>
