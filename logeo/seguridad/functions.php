<?php
	require 'conn_mysqli.php';
	function mostrarError($conn,$valor)
	{
		?>
		<center>
			<label style="font-family: calibri;color: red;">
				<b>Error al ejecutar la sentencia:</b> <u><?php echo $valor; ?></u><br>
				<b><u><?php echo $conn->error; ?></u></b><br>
				<b>Numero de error: </b><u><?php echo $conn->errno; ?></u>
			</label>
		</center>
		<?php
		exit;
	}
?>