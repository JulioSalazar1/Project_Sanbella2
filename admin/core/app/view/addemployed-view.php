<?php

include "../admin/core/app/model/EmployedData.php";
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





if(count($_POST)>0){
	  try {
	$user = new EmployedData();
	$service_id = "NULL";
	if($_POST["service_id"]!=""){ $service_id = $_POST["service_id"]; }
	$user->name = $_POST["name"];
	$user->service_id = $service_id;
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();
	
 $log->info('NUEVO EMPLEADO: '. $user->name.' AGREGADO CORRECTAMENTE EN LA BASE DE DATOS' );

   print "<script>window.location='index.php?view=employeds';</script>";
    } catch (Exception $e) {
        $log->error('ERROR AL AGREGAR EMPLEADO: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }
}

print "<script>window.location='index.php?view=employeds';</script>";



?>

