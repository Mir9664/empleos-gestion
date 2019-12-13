<?php
	date_default_timezone_set('GMT');
	date_default_timezone_set('America/Mexico_City');
	$host="us-cdbr-iron-east-05.cleardb.net";
	$user="b86215deba7ef4";
	$pass="9295d684";
	$name="heroku_872456c89d48216";
	$conn=@new mysqli($host,$user,$pass,$name);
	if (mysqli_connect_errno())
	{
		exit;
	}
?>