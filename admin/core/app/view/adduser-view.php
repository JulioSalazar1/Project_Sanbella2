<?php

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
	 try {
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();
 $log->info('NUEVO USUARIO: '. $user->name.' AGREGADO CORRECTAMENTE EN LA BASE DE DATOS' );

  print "<script>window.location='index.php?view=users';</script>";
    } catch (Exception $e) {
        $log->error('ERROR AL AGREGAR USUARIO: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
       
    }
}

print "<script>window.location='index.php?view=users';</script>";



?>

