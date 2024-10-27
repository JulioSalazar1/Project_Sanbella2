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
$log->info('INGRESO A FORMULARIO DE GENERAR REPORTE' );
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="title">GESTIÓN DE REPORTES</h4>
			</div>
		<div class="card-content table-responsive">


		<form class="form-horizontal" role="form">
		<input type="hidden" name="view" value="reports">
        <?php
		$clients = ClientData::getAll();
		$employeds = EmployedData::getAll();
		$statuses = StatusData::getAll();
		$payments = PaymentData::getAll();
        ?>

		<div class="form-group">

			<div class="col-lg-3">
				<div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-male"></i></span>
					<select name="client_id" class="form-control">
					<option value="">CLIENTE</option>
					  <?php foreach($clients as $p):?>
						<option value="<?php echo $p->id; ?>" <?php if(isset($_GET["client_id"]) && $_GET["client_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
					  <?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="input-group">
				  <span class="input-group-addon"><i class="fa fa-support"></i></span>
					<select name="employed_id" class="form-control">
					<option value="">EMPLEADO</option>
					  <?php foreach($employeds as $p):?>
						<option value="<?php echo $p->id; ?>" <?php if(isset($_GET["employed_id"]) && $_GET["employed_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
					  <?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="input-group">
				  <span class="input-group-addon">INICIO</span>
				  <input type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="input-group">
				  <span class="input-group-addon">FIN</span>
				  <input type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
				</div>
			</div>

		</div>
		
		
		<div class="form-group">

			<div class="col-lg-3">
				<div class="input-group">
				  <span class="input-group-addon">ESTADO</span>
					<select name="status_id" class="form-control">
					  <?php foreach($statuses as $p):?>
						<option value="<?php echo $p->id; ?>" <?php if(isset($_GET["status_id"]) && $_GET["status_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
					  <?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="input-group">
				  <span class="input-group-addon">PAGO</span>
					<select name="payment_id" class="form-control">
					  <?php foreach($payments as $p):?>
						<option value="<?php echo $p->id; ?>" <?php if(isset($_GET["payment_id"]) && $_GET["payment_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
					  <?php endforeach; ?>
					</select>
				</div>
			</div>
			
			<div class="col-lg-6">
			<button class="btn btn-success btn-block">EMITIR REPORTE</button>
			</div>

		</div>
		</form>

		<?php
$users= array();
if((isset($_GET["status_id"]) && isset($_GET["payment_id"]) && isset($_GET["client_id"]) && isset($_GET["employed_id"]) && isset($_GET["start_at"]) && isset($_GET["finish_at"]) ) && ($_GET["status_id"]!="" ||$_GET["payment_id"]!="" || $_GET["client_id"]!="" || $_GET["employed_id"]!="" || ($_GET["start_at"]!="" && $_GET["finish_at"]!="") ) ) {
$sql = "select * from reservation where ";
if($_GET["status_id"]!=""){
	$sql .= " status_id = ".$_GET["status_id"];
}

if($_GET["payment_id"]!=""){
if($_GET["status_id"]!=""){
	$sql .= " and ";
}
	$sql .= " payment_id = ".$_GET["payment_id"];
}


if($_GET["client_id"]!=""){
if($_GET["status_id"]!=""||$_GET["payment_id"]!=""){
	$sql .= " and ";
}
	$sql .= " client_id = ".$_GET["client_id"];
}

if($_GET["employed_id"]!=""){
if($_GET["status_id"]!=""||$_GET["client_id"]!=""||$_GET["payment_id"]!=""){
	$sql .= " and ";
}

	$sql .= " employed_id = ".$_GET["employed_id"];
}



if($_GET["start_at"]!="" && $_GET["finish_at"]){
if($_GET["status_id"]!=""||$_GET["client_id"]!="" ||$_GET["employed_id"]!="" ||$_GET["payment_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " ( date_at >= \"".$_GET["start_at"]."\" and date_at <= \"".$_GET["finish_at"]."\" ) ";
}

//echo $sql;
		$users = ReservationData::getBySQL($sql);

}else{
		$users = ReservationData::getAllPendings();

}
		if(count($users)>0){
			// si hay usuarios
			$_SESSION["report_data"] = $users;
			?>
			<div class="panel panel-default">
			<div class="panel-heading">
			REPORTES
			</div>
			<table id="example1" class="table table-bordered ">
			<thead>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">ASUNTO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">CLIENTE</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">EMPLEADO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">FECHA</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">ESTADO</th>
			<th style="font-weight: bold;background-color: #dbdbdb;border: 1px solid black;">PRECIO</th>
			
			</thead>
			<?php
			$total = 0;
			foreach($users as $user){
				$client  = $user->getClient();
				$employed = $user->getEmployed();
				?>
				<tr>
				<td style="border: 1px solid black;"><?php echo $client->name." ".$client->lastname; ?></td>
				<td style="border: 1px solid black;"><?php echo $employed->name." ".$employed->lastname; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->date_at." ".$user->time_at; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->getStatus()->name; ?></td>
				<td style="border: 1px solid black;"><?php echo $user->getPayment()->name; ?></td>
				<td style="border: 1px solid black;">S/. <?php echo number_format($user->price,2,".",",");?></td>
				</tr>
				<?php
				$total += $user->price;

			}
			echo "</table>";
			?>
			<div class="panel-body">
			<h1>TOTAL: S/: <?php echo number_format($total,2,".",",");?></h1>
			<a href="./report/report-word.php" class="btn btn-default"><i class="fa fa-download"> Descargar (.docx)</i></a>

			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>NO EXISTE INFORMACIÓN A MOSTRAR</p>";
		}


		?>

	</div>
</div>

	</div>
</div>
