<?php

if(count($_POST)>0){
	$user = new PacientData();
	$nationality_id = "NULL";
	$insurance_id = "NULL";
	$img = new Upload($_FILES["image"]);

	if($img->uploaded){
		$img->Process("storage/");
		if($img->processed){
			$user->image=$img->file_dst_name;
		}
	}

	if($_POST["nationality_id"]!=""){ $nationality_id = $_POST["nationality_id"]; }
	if($_POST["insurance_id"]!=""){ $insurance_id = $_POST["insurance_id"]; }


	$user->no = $_POST["no"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->gender = $_POST["gender"];
	$user->day_of_birth = $_POST["day_of_birth"];
	$user->age = $_POST["age"];
	$user->nationality_id = $nationality_id;
	$user->insurance_id = $insurance_id;

	$user->sick = $_POST["sick"];
	$user->medicaments = $_POST["medicaments"];
	$user->alergy = $_POST["alergy"];
	

	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->password = sha1(md5($_POST["password"]));
	$user->phone = $_POST["phone"];

	$user->policy_num = $_POST["policy_num"];
	$user->reference_num = $_POST["reference_num"];
	$user->admissiondate = $_POST["admissiondate"];
	$user->departuredate = $_POST["departuredate"];
	$user->regplace = $_POST["regplace"];

	$user->add();

print "<script>window.location='index.php?view=pacients';</script>";


}


?>