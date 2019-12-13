<?php
$df=date("l", strtotime($df)); 
switch ($df) {
case 'Monday': {
	$dia="LUNES";
} break;
case 'Tuesday': {
	$dia="MARTES";
} break;
case 'Wednesday': {
	$dia="MIERCOLES";
} break;
case 'Thursday': {
	$dia="JUEVES";
} break;
case 'Friday': {
	$dia="VIERNES";
} break;
case 'Saturday': {
	$dia="SABADO";
} break;
case 'Sunday': {
	$dia="DOMINGO";
} break;
default:
$dia="INDEFINIDO";
}
?>