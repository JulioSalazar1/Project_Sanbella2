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
if(count($_POST)>0){
	TRY{
	$user = EmployedData::getById($_POST["user_id"]);

	$service_id = "NULL";
	if($_POST["service_id"]!=""){ $service_id = $_POST["service_id"]; }
	$user->name = $_POST["name"];
	$user->service_id = $service_id;
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->update();

$log->info('USUARIO REALIZO ACTUALIZACION A EMPLEADO DE MANERA EXITOSA' );
print "<script>window.location='index.php?view=employeds';</script>";
 } catch (Exception $e) {
        $log->error('ERROR AL AGREGAR SERVICIO: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }

}


?>