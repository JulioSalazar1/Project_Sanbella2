<?php

$service = ServiceData::getById($_GET["id"]);

$service->del();
Core::redir("./index.php?view=services");


?>