<?php 	
		//require('seguridad.php'); 
		 require '../seguridad/conn_mysqli.php';
		if(isset($_POST['suc'])){
			@session_start();
			if (isset($_SESSION["sucursal"]) and $_SESSION['s2cd0rf1it8t'] == 1){				
                    $c=$_SESSION["usuarioactual"];
					$idsuc=$_SESSION['sucursal'];
					$suc=$_POST['suc'];
					$sql_user="update personal set
					idsuc=$suc
					WHERE 
					rfcp ='$c' AND fk_puesto =1 and idsuc=$idsuc";
					$resultado=$conn->query($sql_user);
					$_SESSION["sucursal"]=$suc;
					echo "<script>parent.location = '../me/index.php';</script>";
			}
			else{
				?>
				<div class="alert alert-danger">
				 <strong>Error!</strong> El cambio no se pudo realizar
				</div>
			<?php
			}			
		}	
		else{
				?>
				<div class="alert alert-danger">
				 <strong>Error!</strong> El cambio no se pudo realizar
				</div>
			<?php
			
		}		
?>