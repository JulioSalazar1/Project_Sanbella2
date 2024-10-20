<?php

$client = EmployedData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=employeds");

?>