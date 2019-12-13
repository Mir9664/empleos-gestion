<?php
    require '../seguridad/conn_mysqli.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>SIFAT - Página No Encontrada</title>
	<?php
		include '../includes/head.php';
	?>
	<style type="text/css">
		body{
			font-family: calibri;
		}
		i.fa-info,h1{
			color: orange;
		}
	</style>
</head>
<body>
	<div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body" align="center">
        		<div class="well">
					<h1><i class="fa fa-info" style="width: 16px"></i> <label style="font-weight: bold;">ADVERTENCIA</label></h1>
					<h2>Página No Encontrada</h2>
					<hr>
					<p align="center" style="font-size: 15px">
						Parece que hubo un error con la página que esta buscando.<br>
						Es posible que la entrada haya sido eliminada o que la dirección no existe.
					</p>
				</div>
				<a href="../sifat/" class="btn btn-primary"><i class="fa fa-home"></i> IR AL INICIO</a>
        	</div>
        </div>
    </div>
</body>
</html>