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
	$user = ServiceData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->update();
	$log->info('USUARIO REALIZO ACTUALIZACION A SERVICIO DE MANERA EXITOSA' );
print "<script>window.location='index.php?view=services';</script>";
 } catch (Exception $e) {
        $log->error('ERROR AL AGREGAR SERVICIO: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }

}


?>