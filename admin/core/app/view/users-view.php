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
$log->info('INGRESO A LISTA DE USUARIOS' );
?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header">
      <h4 class="title">GESTIÓN DE USUARIOS</h4>
  </div>
  <div class="card-content table-responsive">


	<a href="index.php?view=newuser" class="btn btn-primary"><i class='fa fa-user'></i> NUEVO USUARIO</a>
<br>
	
		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
		<table id="example1" class="table table-bordered ">
			<thead>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">NOMBRE Y APELLIDO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">USUARIO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">EMAIL</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">ACTIVO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">ADMINISTRADOR</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">OPCIONES</th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td style="border: 1px solid black;"><?php echo $user->name." ".$user->lastname; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->username; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->email; ?></td>
				<td style="border: 1px solid black;">
					<?php if($user->is_active):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td style="border: 1px solid black;">
					<?php if($user->is_admin):?>
						<i class="fa fa-check"></i>
					<?php endif; ?>
				</td>
				<td style="border: 1px solid black;width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
				<?php

			}
			?>
			</table>
			<?php



		}else{
			// no hay usuarios
		}


		?>

</div>
</div>
	</div>
</div>