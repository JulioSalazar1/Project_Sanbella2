<?php
include "../core/autoload.php";
include "../core/app/model/ReservationData.php";
include "../core/app/model/ClientData.php";
include "../core/app/model/EmployedData.php";
include "../core/app/model/StatusData.php";
include "../core/app/model/PaymentData.php";
include "../core/app/model/ServiceData.php";
session_start();

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$alu = $_SESSION["report_data"];

$section1 = $word->AddSection();
$section1->addText("REPORTE DE EMPLEADOS",array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("NOMBRES Y APELLIDOS");
$table1->addCell()->addText("DIRECCIÓN");
$table1->addCell()->addText("EMAIL");
$table1->addCell()->addText("TELEFONO");
$table1->addCell()->addText("SERVICIO/ESPECIALIDAD");

$total = 0;
foreach($alu as $al){
	$servi = $al->getService();
$table1->addRow();
$table1->addCell(5000)->addText($al->name." ".$al->lastname);
$table1->addCell(5000)->addText($al->address);
$table1->addCell(5000)->addText($al->email);
$table1->addCell(5000)->addText($al->phone);
$table1->addCell(5000)->addText($servi->name);

}





$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Generado por SISTEMA SANBELLA");
$filename = "report-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename=$filename");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file



?>