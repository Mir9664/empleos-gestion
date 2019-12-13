<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';
    if (isset($_POST['dato_idP']))
    {
    	$idP=$_POST['dato_idP'];
    	$sel=$conn->query("SELECT *FROM personal WHERE idpersonal=".$idP);
    	$fet=$sel->fetch_assoc();
    	?>
    	<b>RFC PERSONAL:</b>
    	<input type="text" name="nom" id="nom" class="form-control" placeholder="RFC" value="<?php echo $fet['rfcp']; ?>" readonly>
    	<?php
    }
?>