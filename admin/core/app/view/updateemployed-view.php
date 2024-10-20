<?php

if(count($_POST)>0){
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


print "<script>window.location='index.php?view=employeds';</script>";


}


?>