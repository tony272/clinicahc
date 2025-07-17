<?php
/**
* BookMedik
* @author evilnapsis modified by TIX Software
* @url http://evilnapsis.com/about/ or http://tix.pe
**/

if(count($_POST)>0){
	$user = new MedicalreportData();
	$medic_id = "NULL";
	$pacient_id = "NULL";
	if($_POST["pacient_id"]!=""){ $pacient_id = $_POST["pacient_id"]; }
	if($_POST["medic_id"]!=""){ $medic_id = $_POST["medic_id"]; }

	$user->type_report = $_POST["type_report"];
	$user->pacient_id = $pacient_id;
	$user->medic_id = $medic_id;
	$user->attention_date = $_POST["attention_date"];
	$user->attention_hour = $_POST["attention_hour"];

	$user->consultation_reason = $_POST["consultation_reason"];
	//añadir columna edad a la tabla medical report
	$user->age = $_POST["age"];
	$user->sick_time = $_POST["sick_time"];
	$user->onset_form = $_POST["onset_form"];
	$user->course = $_POST["course"];
	$user->history_disease = $_POST["history_disease"];
	$user->record = $_POST["record"];
	$user->alergy = $_POST["alergy"];

	$user->so2 = $_POST["so2"];
	$user->pa = $_POST["pa"];
	$user->fc = $_POST["fc"];
	$user->fr = $_POST["fr"];
	$user->temperature = $_POST["temperature"];

	$user->general = $_POST["general"];
	$user->skin = $_POST["skin"];
	$user->eyes = $_POST["eyes"];
	$user->mouth = $_POST["mouth"];
	$user->pharynx = $_POST["pharynx"];
	$user->neck = $_POST["neck"];
	$user->thorax = $_POST["thorax"];
	$user->cardiovascular = $_POST["cardiovascular"];
	$user->abdomen = $_POST["abdomen"];
	$user->genitourinary = $_POST["genitourinary"];
	$user->neurologic = $_POST["neurologic"];
	$user->musculoskeletal = $_POST["musculoskeletal"];
	$user->extremities = $_POST["extremities"];
	
	$user->diagnosis = $_POST["diagnosis"];
	$user->treatment = $_POST["treatment"];
	$user->complementarie_test = $_POST["complementarie_test"];
	
	$user->add();

print "<script>window.location='index.php?view=dossiers';</script>";


}


?>