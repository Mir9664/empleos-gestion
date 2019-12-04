<?php
$con = new mysqli("us-cdbr-iron-east-05.cleardb.net", "b86215deba7ef4", "9295d684", "heroku_872456c89d48216");
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
?>
