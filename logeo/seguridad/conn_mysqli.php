<?php
	date_default_timezone_set('GMT');
	date_default_timezone_set('America/Mexico_City');
	$host="localhost";
	$user="root";
	$pass="";
	$name="pw";
	$conn=@new mysqli($host,$user,$pass,$name);
	if (mysqli_connect_errno())
	{
		exit;
	}
?>