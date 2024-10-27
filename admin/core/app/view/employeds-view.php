<?php
include "../admin/core/app/model/ClientData.php";
include "../admin/core/app/model/EmployedData.php";
include "../admin/core/app/model/PaymentData.php";
include "../admin/core/app/model/PostData.php";
include "../admin/core/app/model/ReservationData.php";
include "../admin/core/app/model/ServiceData.php";
include "../admin/core/app/model/StatusData.php";
include "../admin/core/app/model/UserData.php";
require_once '../admin/core/app/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
date_default_timezone_set('America/Lima'); 

$log = new Logger('MENSAJE:');
$stream = new StreamHandler('app.log');
$formatter = new LineFormatter(null, 'Y-m-d H:i:s', true);
$stream->setFormatter($formatter);
$log->pushHandler($stream);
$log->info('INGRESO A VISUALIZAR LISTA DE EMPLEADOS' );

?>

<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/employed-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>

</div>
<div class="card">
  <div class="card-header" >
      <h4 class="title">GESTIÓN DE EMPLEADOS</h4>
  </div>
  <div class="card-content table-responsive">

	<a href="index.php?view=newemployed" class="btn btn-primary"><i class='fa fa-users'></i> Nuevo Empleado</a>

		<?php

		$users = EmployedData::getAll();
		if(count($users)>0){
			// si hay usuarios
						$_SESSION["report_data"] = $users;
			?>

			<table id="example1" class="table table-bordered ">
			<thead>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">NOMBRES Y APELLIDOS</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">DIRECCION</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">EMAIL</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">TELEFONO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">ESPECIALIDAD</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">OPCIONES</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td style="border: 1px solid black;"><?php echo $user->name." ".$user->lastname; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->address; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->email; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->phone; ?></td>
				<td style="border: 1px solid black;"><?php if($user->service_id!=null){ echo $user->getService()->name; } ?></td>
				<td style="border: 1px solid black;width:280px;">
				<a href="index.php?view=employedhistory&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Historial</a>
				<a href="index.php?view=editemployed&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delemployed&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

				</td>
				</tr>
				<?php
			}
?>
</table>
			</div>
			</div>
			<?php
			


		}else{
			echo "<p class='alert alert-danger'>No hay empleados</p>";
		}


		?>


	</div>
</div>