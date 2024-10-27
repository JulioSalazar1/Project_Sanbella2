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
$log->info('INGRESO A FORMULARIO PARA EDITAR RESERVACION' );


$reservation = ReservationData::getById($_GET["id"]);
$clients = ClientData::getAll();
$employeds = EmployedData::getAll();
$statuses = StatusData::getAll();
$services = ServiceData::getAll();
$payments = PaymentData::getAll();
?>
<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header">
      <h4 class="title">MODIFICAR RESERVACIÓN</h4>
  </div>
  <div class="card-content table-responsive">
<form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">
<div class="col-md-6">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">ASUNTO:</label>
    <div class="col-lg-8">
      <input type="text" name="title" value="<?php echo $reservation->title; ?>" required class="form-control" id="inputEmail1" placeholder="Asunto">
    </div>
  </div>
   
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">TIPO DE SERVICIO:</label>
    <div class="col-lg-8">
<select name="service_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($services as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->service_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name; ?></option>
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
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->client_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
	</div>
	
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">EMPLEADO:</label>
    <div class="col-lg-8">
<select name="employed_id" class="form-control" required>
<option value="">-- SELECCIONE --</option>
  <?php foreach($employeds as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->employed_id){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">FECHA Y HORA:</label>
    <div class="col-lg-4">
      <input type="date" name="date_at" value="<?php echo $reservation->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
    <div class="col-lg-4">
      <input type="time" name="time_at" value="<?php echo $reservation->time_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
    </div>
  </div>
  
  </div>
 <div class="col-md-6">
 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">ESTADO:</label>
    <div class="col-lg-8">
<select name="status_id" class="form-control" required>
  <?php foreach($statuses as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->status_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
	 </div>
		
	<div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">MEDIO DE PAGO:</label>
    <div class="col-lg-8">
<select name="payment_id" class="form-control" required>
  <?php foreach($payments as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$reservation->payment_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
  </div>
  
  

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">PRECIO:</label>
    <div class="col-lg-8">

 
  <input type="text" class="form-control" value="<?php echo $reservation->price;?>" name="price" placeholder="Precio">

    </div>
  </div>
  
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-4 control-label">NOTA:</label>
    <div class="col-lg-8">
	
    <textarea class="form-control" name="note" placeholder="Nota"><?php echo $reservation->note;?></textarea>
   
	</div>
  </div>

  <div class="form-group" align="center">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
      <button type="submit" class="btn btn-success">ACTUALIZAR RESERVACIÓN</button>
    </div>
  </div>
</form>
</div>
</div>
	</div>
</div>