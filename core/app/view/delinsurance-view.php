<?php

$client = InsuranceData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=insurances");

?>