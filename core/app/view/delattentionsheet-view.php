<?php

$client = AttentionsheetData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=attentionsheet");

?>