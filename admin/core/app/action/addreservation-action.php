<?php



$rx = ReservationData::getRepeated($_POST["client_id"],$_POST["employed_id"],$_POST["date_at"],$_POST["time_at"]);
if($rx==null){
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
}else{
Core::alert("Error al agregar, Cita Repetida!");
}
Core::redir("./index.php?view=reservations");
?>