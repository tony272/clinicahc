<?php

$client = MedicalreportData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=dossiers");

?>