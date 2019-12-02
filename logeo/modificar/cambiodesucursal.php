<?php require('seguridad.php'); ?>
   <link href="css/animaciones.css" rel="stylesheet">
   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
	<div class="panel panel-success">
    <div class="panel-heading">
         <h3 class="panel-title">Cambio de Sucursal</h3>
    </div>
    <div class="panel-body">
              <form action="cambiodesucursal.php" method="post" >				
				<label class="label_title">Sucursal:</label> 
				<?php 
				include('conexion.php');
			  //$consulta="select c.cuenta, b.banco from cuentas c,bancos b where c.banco=b.idbanco";
			  $consulta="select * from sucursales";
			  $recordset=$conexion->query($consulta);
			  ?>
				<select name="suc" id="suc" onchange="" required>
				  <option value="">Seleccione</option>				
				  <?php while ($row=$recordset->fetch_assoc()){?>				 
				  <option value="<?php echo $row["idsuc"]?>"> 
				  <?php echo  $row["nombres"];?> </option>
				  <?php } $conexion->close();?>
				</select><br>				
				<input type="hidden" name="fn" value="1"/>		
				<input type="submit" name="submit" value="Cambiar" class="btn btn-success" />					
		</form>
		<?php
		if(isset($_POST['suc'])){
			@session_start();
			if (isset($_SESSION["idsuc"])) {	
				$_SESSION["idsuc"]= $_POST['suc'];
				echo "<script>parent.location = 'index2.php';</script>";
			}else{
				echo "<b><font size=4 color=#C84E08>
					<p>No se pudo realizar el cambio</p>
				</font></b>";
			}
		}		
		?>
     </div>
    </div>
	
		
