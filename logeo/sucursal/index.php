<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
	require '../seguridad/seguridadadmon.php';
    require '../includes/generaCeros.php';
    require '../includes/numeros.php';
    require '../includes/fechas.php';

    $resInst=$conn->query("SELECT *FROM empresa");
    $we=$resInst->fetch_assoc();
    $date=date('Y');
    $matriz1 = str_split($date);
    $uno=$matriz1[0];
    $dos=$matriz1[1];
    $tre=$matriz1[2];
    $cua=$matriz1[3];
    $anio=$uno.$tre.$cua;
?>
<!DOCTYPE html>
<html>
<head>
	<title>ME - Datos</title>
    <?php
        include '../includes/head.php';
    ?>    
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php
                include '../includes/menu.php';
            ?>
        </nav>
		<div id="page-wrapper"><br><br><br><br><br><br>
			<div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissable" id="msg" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <br>
                    </div>
                	<div class="panel panel-default">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-motorcycle"></i> Cambio de Sucursal</h5>
                        <div id="load_ajax_servicio" align="center"></div>						
                    </div>	
                        <div class="panel-body">
						
							<form action="cambio.php" method="post">	
								<div class="form-group">	
									<label class="label_title">Sucursal:</label> 
									  <?php 
									  $consulta="select * from sucursales";
									  $recordset=$conn->query($consulta);
									  ?>
										<select name="suc" id="suc" onchange="" required>
										  <option value="">Seleccione</option>				
										  <?php while ($row=$recordset->fetch_assoc()){?>				 
										  <option value="<?php echo $row["idsuc"]?>"> 
										  <?php echo  $row["nombres"];?> </option>
										  <?php } $conn->close();?>
										</select>								
								</div>
								<div class="modal-footer">
									<button id="btnCambio2" type="submit"									
									class="btn btn-primary">
									<i class="fa fa-refresh">
									</i> Cambiar</button>
								</div>
							</form>
							
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	
    <script type="text/javascript">

    	$(document).ready(function()
    	{
	
			//ACTUALIZAR SUCURSAL
			$("#btnCambio").click(function()
            {
				$.ajax({
                    url: 'cambio.php',
                    type: 'POST',
					 data: {
						suc: $("#suc").val(),
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_servicio").html(datos);
                    },
                });
            });

        });
    </script>
</body>
</html>