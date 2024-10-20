<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>SANBELLA SYSTEM</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
	   <!-- Favicon -->
    <link href="../img/logo.ico" rel="icon">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
     <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/fullcalendar/moment.min.js'></script>
<script src='assets/fullcalendar/fullcalendar.min.js'></script>
<?php endif; ?>

</head>

<body>
<?php if(isset($_SESSION["user_id"])):?>
<div class="wrapper">

    <div class="sidebar" >
		<div class="logo">
			<a href="./"><img src="../img/titulo.jpg" width="220px" height="80px">  </a>
		</div>

		<div class="sidebar-wrapper">
			<ul class="nav">
				<li id="agenda-item">
					<a href="./">
						<i class="fa fa-calendar"></i>
						<p>AGENDA</p>
					</a>
				</li>
				<li id="reserva-item">
					<a href="./?view=reservations">
						<i class="fa fa-book"></i>
						<p>RESERVACIÓN</p>
					</a>
				</li>
				<li id="cliente-item">
					<a href="./?view=clients">
						<i class="fa fa-male"></i>
						<p>CLIENTES</p>
					</a>
				</li>
				<li id="empleado-item">
					<a href="./?view=employeds">
						<i class="fa fa-users"></i>
						<p>EMPLEADOS</p>
					</a>
				</li>
				<li id="servicio-item">
					<a href="./?view=services">
						<i class="fa fa-th-list"></i>
						<p>SERVICIOS</p>
					</a>
				</li>
				<li id="reporte-item">
					<a href="./?view=reports">
						<i class="fa fa-area-chart"></i>
						<p>REPORTES</p>  

					</a>
				</li>
				<li id="usuario-item">
					<a href="./?view=users">
						<i class="fa fa-users"></i>
						<p>USUARIOS</p>
					</a>
				</li>
			</ul>
		</div>
	</div>

    <div class="main-panel">
		<nav class="navbar navbar-absolute">
			<div class="container-fluid">
			
			
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./"><b></b></a>
			  </div>
			  
			  
			  <div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-user"> <?php echo $_SESSION["user_name"]." ".$_SESSION["user_lastname"]; ?></i>
					</a>
					<ul class="dropdown-menu">
					  <li>
					 
					  
					  <a href="logout.php"><i class="fa fa-trash"> </i> Salir</a></li>
					</ul>
				  </li>
				</ul>
			  </div>  
			</div>
		</nav>

		<div class="content">
			<div class="container-fluid">
				<?php 
					View::load("login");
				?>
			</div>
		</div>
    </div>

<?php else:?>
<?php View::load("login");?>
<?php endif;?>

	<footer class="footer">
        <div class="container-fluid">
			<nav class="pull-right">
				<ul>
				  
				  <li>
					<a href="#">
					 
					</a>
				  </li>
	   
				  <li>
					<a href="#">
					  
					</a>
				  </li>
				  <li>
					<a href="#">
					
					</a>
				  </li>
				  <li>
					<a href="#">
					 
					</a>
				  </li>
					<li>
					
					  <a href="http://sanbella.com" target="_blank">SANBELLA &copy; 2024 </a>
					
				  </li>
				</ul>
				
			</nav>
				
			</p>
        </div>
    </footer>  
</div>
</body>
<!-- DataTables -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
  <!--   Core JS Files   -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js" type="text/javascript"></script>
 
  <!--  Charts Plugin -->
  <script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- Material Dashboard javascript methods -->
  <script src="assets/js/material-dashboard.js"></script>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/js/demo.js"></script>
<!-- DataTables 
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>-->
  <script type="text/javascript">
      $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script>
<script>
  // Función para marcar un elemento como activo
  function markActive(elementId) {
    const allItems = document.querySelectorAll('.nav li');
    allItems.forEach(item => item.classList.remove('active'));
    document.getElementById(elementId).classList.add('active');
    localStorage.setItem('activeMenuItem', elementId);
  }

  // Al cargar la página, marcar el elemento activo según el localStorage
  window.onload = () => {
    const activeItemId = localStorage.getItem('activeMenuItem');
    if (activeItemId) {
      markActive(activeItemId);
    }
  };

  // Agregar un evento de clic a cada elemento del menú
  const menuItems = document.querySelectorAll('.nav li a');
  menuItems.forEach(item => {
    item.addEventListener('click', () => {
      markActive(item.parentNode.id);
    });
  });
</script>
<script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true,
      "language": idioma_español
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,

      "language": idioma_español
    })
  })
  var idioma_español= {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
</script>

</html>
