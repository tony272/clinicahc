<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$status=0;
	if(isset($_POST["status"])){$status=1;}
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->status=$status;
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>