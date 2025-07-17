<?php
/**
* BookMedik
* @author TIX Software
* @url http://tix.pe
**/

if(count($_POST)>0){
	$user = new InsuranceData();
	$user->name = $_POST["name"];
	$user->sbs_code = $_POST["sbs_code"];
	$user->ruc = $_POST["ruc"];

	$user->address = $_POST["address"];
	$user->phone = $_POST["phone"];
	$user->email = $_POST["email"];
	$user->webpage = $_POST["webpage"];
	
	$user->add();

print "<script>window.location='index.php?view=insurances';</script>";


}


?>