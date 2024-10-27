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
$log->info('INGRESO A FORMULARIO DE NUEVO SERVICIO' );
?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header">
      <h4 class="title">NUEVO SERVICIO</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addservice" action="index.php?view=addservice" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">NOMBRE: </label>
    <div class="col-md-8">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">AGREGAR SERVICIO</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>