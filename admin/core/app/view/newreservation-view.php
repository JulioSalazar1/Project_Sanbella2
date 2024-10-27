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
$log->info('INGRESO A FORMULARIO DE NUEVA RESERVACION' );

$clients = ClientData::getAll();
$employeds = EmployedData::getAll();
$services = ServiceData::getAll();
$statuses = StatusData::getAll();
$payments = PaymentData::getAll();

?>

<div class="row">
<div class="col-md-12">

<div class="card">
  <div class="card-header">
     <h4 class="title">NUEVA RESERVACIÓN</h4> 
  </div>

<form class="form-horizontal" role="form" method="post" action="./?action=addreservation">
 
<div class="col-md-6">

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">ASUNTO:</label>
    <div class="col-lg-8">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="ASUNTO">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">TIPO DE SERVICIO:</label>
    <div class="col-lg-8">
<select name="service_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($services as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">CLIENTE:</label>
    <div class="col-lg-8">
<select name="client_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($clients as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">EMPLEADO:</label>
    <div class="col-lg-8">
<select name="employed_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($employeds as $p):
  $service_nombre = ServiceData::getById($p->service_id);
  ?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname." (".$service_nombre->name.")"; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">FECHA Y HORA:</label>
    <div class="col-lg-4">
      <input type="date" name="date_at" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
    <div class="col-lg-4">
      <input type="time" name="time_at" required class="form-control" id="inputEmail1" placeholder="Hora">
    </div>
  </div>
  
  
  
   </div>
  
  <div class="col-md-6">

 
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">TIPO DE PAGO:</label>
    <div class="col-lg-8">
<select name="payment_id" class="form-control" required>
  <?php foreach($payments as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">ESTADO:</label>
    <div class="col-lg-8">
<select name="status_id" class="form-control" required>
  <?php foreach($statuses as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">PRECIO:</label>
    <div class="col-lg-8">

  
  <input type="text" class="form-control" name="price" placeholder="S/.">

    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">NOTA:</label>
    <div class="col-lg-8">
	
    <textarea class="form-control" name="note" placeholder="Nota"></textarea>
	
    </div>
  </div>

  <div class="form-group" align="center">
    <div class="col-lg-offset-4 col-lg-8">
      <button type="submit" class="btn btn-success">AGREGAR RESERVA</button>
    </div>
  </div>
  
  </div>
  
  
   
</form>
</div>
</div>
</div>