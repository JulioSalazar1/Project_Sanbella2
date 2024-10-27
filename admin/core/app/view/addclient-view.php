<?php

include "../admin/core/app/model/ClientData.php";
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
	$user = new ClientData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->gender = $_POST["gender"];
	$user->day_of_birth = $_POST["day_of_birth"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();
	

    $log->info('NUEVO CLIENTE: '. $user->name.' AGREGADO CORRECTAMENTE EN LA BASE DE DATOS' );

    print "<script>window.location='index.php?view=clients';</script>";
    } catch (Exception $e) {
        $log->error('ERROR AL AGREGAR CLIENTE: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }
}

print "<script>window.location='index.php?view=clients';</script>";



?>