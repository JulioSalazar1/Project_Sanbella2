<?php


if(count($_POST)>0){
	$user = new ServiceData();
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=services';</script>";


}


?>