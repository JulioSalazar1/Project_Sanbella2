<?php


include "../admin/core/app/model/ServiceData.php";
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
	$user = new ServiceData();
	$user->name = $_POST["name"];
	$user->add();
 $log->info('NUEVO SERVICIO: '. $user->name.' AGREGADO CORRECTAMENTE EN LA BASE DE DATOS' );

   print "<script>window.location='index.php?view=services';</script>";
    } catch (Exception $e) {
        $log->error('ERROR AL AGREGAR SERVICIO: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }
}

print "<script>window.location='index.php?view=services';</script>";



?>

