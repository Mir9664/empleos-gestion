<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';

    if (isset($_POST['idp']) || isset($_POST['idc']))
    {
    	$idP=$_POST['idp'];
    	$idC=$_POST['idc'];
    	$conn->query("INSERT INTO tbls_auxiliar (fk_personal,fk_ccontable) VALUES ('".$idP."','".$idC."')");
    }
?>