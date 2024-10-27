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
$log->info('INGRESO A LISTA DE SERVICIOS' );
?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" >
      <h4 class="title">GESTIÓN DE SERVICIOS</h4>
  </div>
  <div class="card-content table-responsive">
	<a href="index.php?view=newservice" class="btn btn-primary"><i class='fa fa-th-list'></i> Nuevo Servicio</a>

		<?php

		$users = ServiceData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table id="example1" class="table table-bordered " >
			<thead>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">NOMBRE DE SERVICIO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;"><b>OPCIONES</b></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr >
				<td style="border: 1px solid black;"><?php echo $user->name." ".$user->lastname; ?></td>
				
				
			<!--	<a href="index.php?view=editservice&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil'></i></a> -->
			<!--	<a href="index.php?view=delservice&id=<?php echo $user->id;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a></td> -->
				
				<td style="border: 1px solid black;width:280px;">


				<a href="index.php?view=editservice&id=<?php echo $user->id;?>" rel="tooltip" title="Editar" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delservice&id=<?php echo $user->id;?>" rel="tooltip" title="Eliminar"  class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				
				</tr>
				<?php

			}
?>
</table>
<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Servicio</p>";
		}


		?>

</div>
</div>
	</div>
</div>