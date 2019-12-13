<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';
    if (isset($_POST['valorBusqueda']))
    {
        $consultaBusqueda = $_POST['valorBusqueda'];         
        $query = $conn->query("SELECT *FROM 
		personal p,sucursales s  
		WHERE 
		s.idsuc=9 and
	   (p.rfcp LIKE '%$consultaBusqueda%' OR 
		p.nombrep LIKE '%$consultaBusqueda%'  OR 
		p.emailp LIKE '%$consultaBusqueda%' OR 
		p.telp LIKE '%$consultaBusqueda%' OR 
		p.sexop LIKE '%$consultaBusqueda%')");
        mostrar($conn,$query);
       }
    else
    {
        $query = $conn->query("SELECT *FROM remitentedestinatario");
        mostrar($conn,$query);
    }
    function mostrar($conn,$query)
    {
        $row=$query->fetch_assoc();
        $count=$query->num_rows;
        if($count>0)
        {
            ?>
			<table class="table table-bordered">
                <thead>
                    <tr style="background-color: #f5f5f5">
                        <!--th>CUENTAS</th-->
                        <th><i class="fa fa-sort-alpha-asc" style="width: 16px"></i>ID</th>
                        <th><i class="fa fa-institution" style="width: 16px"></i>CLIENTE</th>
                        <th><i class="fa fa-street-view" style="width: 16px"></i>DOMICILIO</th>
						<th><i class="fa fa-money" style="width: 16px"></i>POBLACION</th>
						<th><i class="fa fa-ticket" style="width: 16px"></i>CIUDAD</th>
						<th><i class="fa fa-money" style="width: 16px"></i>TELEFONO</th>
                        <th style="text-align: center;"><i class="fa fa-edit" style="width: 16px"></i> ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                do 
                {
                ?>
                    <tr>
                        <td><?php echo $row['idpersonard']; ?></td>
                        <td><?php echo $row['nombrerd']; ?></td>
						<td><?php echo $row['domiciliord'].' '.$row['coloniard']; ?></td>
						<td><?php echo $row['poblacionrm']; ?></td>
						<td><?php echo $row['ciudadrd']; ?></td>
						<td><?php echo $row['telefono1rd']; ?></td>						
                       <td align="center">
							 <button 
							class="btn btn-warning btn-xs" data-toggle='modal' data-target='#modCliente' 
							data-mid='<?php echo $row['idpersonard'];  ?>' 
                            data-mnomrd='<?php echo $row['nombrerd']; ?>' 
                            data-mdord='<?php echo $row['domiciliord']; ?>'
							data-mcolrd='<?php echo $row['coloniard']; ?>'
							data-mpord='<?php echo $row['poblacionrm']; ?>'
                            data-mciurd='<?php echo $row['ciudadrd']; ?>' 
                            data-mtelrd1='<?php echo $row['telefono1rd']; ?>'                           
                            data-mtelrd2='<?php echo $row['telefono2rd']; ?>' 
                            data-mcprd='<?php echo $row['cprd']; ?>'
							data-mrfcrd='<?php echo $row['rfcrd']; ?>' 
                            data-mcorrd='<?php echo $row['correord']; ?>' 
                            data-mestrd='<?php echo $row['estadord']; ?>' 
							> 
							<i class="fa fa-refresh"></i> | <i class="fa fa-trash"></i>
							</button>
                        </td>
                    </tr>
                
                <?php
                }
                while ($row = $query->fetch_assoc());
                ?>
                </tbody>
                <tfoot align=center style='color:red'>
                    <tr>
                        <td colspan=15><b>
                            <?php
                                if ($count>=10)
                                {
                                    echo "Se Encontraron: ";
                                }
                                else
                                {
                                    echo "Se Encontro: ";
                                }
                                if ($count>1)
                                {
                                    echo $count." Coincidencias";
                                }
                                else
                                {
                                    echo $count." Coincidencia";
                                }
                            ?>
                        </b></td>
                    </tr>
                </tfoot>
            </table>			
            <?php
        }
        else
        {
            ?>
            <div class="alert alert-warning" align="center">
                <b>NO EXISTE NINGUN DATO</b>
            </div>
            <?php
        }
    }
?>