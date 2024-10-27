<?php

include "../admin/core/app/model/ReservationData.php";
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


$rx = ReservationData::getRepeated($_POST["client_id"],$_POST["employed_id"],$_POST["date_at"],$_POST["time_at"]);
if($rx==null){
	  try {
$r = new ReservationData();
$r->title = $_POST["title"];
$r->note = $_POST["note"];
$r->client_id = $_POST["client_id"];
$r->employed_id = $_POST["employed_id"];
$r->date_at = $_POST["date_at"];
$r->time_at = $_POST["time_at"];
$r->user_id = $_SESSION["user_id"];
$r->service_id = $_POST["service_id"];
$r->status_id = $_POST["status_id"];
$r->payment_id = $_POST["payment_id"];
$r->price = $_POST["price"];




$r->add();

Core::alert("Agregado exitosamente!");

    $log->info('NUEVA RESERVACION AGREGADA CORRECTAMENTE EN LA BASE DE DATOS' );

 print "<script>window.location='index.php?view=reservations';</script>";
    } catch (Exception $e) {
		Core::alert("Error al agregar, RESERVACION Repetida!");
        $log->error('ERROR AL AGREGAR RESERVACION: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }
}

print "<script>window.location='index.php?view=reservations';</script>";
//Core::redir("./index.php?view=reservations");


?>
