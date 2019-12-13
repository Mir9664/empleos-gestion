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
        $query = $conn->query("SELECT *FROM importes i,sucursales s WHERE  i.idsuc=s.idsuc ");
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
                        <th><i class="fa fa-institution" style="width: 16px"></i>SUCURSAL</th>
                        <th><i class="fa fa-street-view" style="width: 16px"></i>DESTINO</th>
						<th><i class="fa fa-money" style="width: 16px"></i>E.LOC</th>
						<th><i class="fa fa-ticket" style="width: 16px"></i>SE.LOC</th>
						<th><i class="fa fa-money" style="width: 16px"></i>P.OC.CH</th>
						<th><i class="fa fa-ticket" style="width: 16px"></i>P.E.CH</th>
						<th><i class="fa fa-money" style="width: 16px"></i>P.SE.CH</th>
						<th><i class="fa fa-ticket" style="width: 16px"></i>P.OC.ME</th>
						<th><i class="fa fa-money" style="width: 16px"></i>P.E.ME</th>
						<th><i class="fa fa-ticket" style="width: 16px"></i>P.SE.ME</th>
						<th><i class="fa fa-money" style="width: 16px"></i>P.OC.G</th>
						<th><i class="fa fa-ticket" style="width: 16px"></i>P.E.G</th>
						<th><i class="fa fa-money" style="width: 16px"></i>P.SE.G</th>
                        <th style="text-align: center;"><i class="fa fa-edit" style="width: 16px"></i> ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                do 
                {
                ?>
                    <tr>
                        <td><?php echo $row['idimportes']; ?></td>
                        <td><?php echo $row['nombres']; ?></td>
						<td><?php echo $row['destino']; ?></td>
						<td><?php echo '$'.$row['express_loc']; ?></td>
						<td><?php echo '$'.$row['superexpress_loc']; ?></td>
					    <td><?php echo '$'.$row['ocurre_chi']; ?></td>
						<td><?php echo '$'.$row['express_chi']; ?></td>
						<td><?php echo '$'.$row['superexpress_chi']; ?></td>
						<td><?php echo '$'.$row['ocurre_me']; ?></td>
						<td><?php echo '$'.$row['express_me']; ?></td>
						<td><?php echo '$'.$row['superexpress_me']; ?></td>
						<td><?php echo '$'.$row['ocurre_gra']; ?></td>
						<td><?php echo '$'.$row['express_gra']; ?></td>
						<td><?php echo '$'.$row['superexpress_gra']; ?></td>
                       <td align="center">
							 <button 
							class="btn btn-warning btn-xs" data-toggle='modal' data-target='#modImporte' 
							data-midimp='<?php echo $row['idimportes'];  ?>' 
                            data-midsuc='<?php echo $row['idsuc']; ?>' 
                            data-mdest='<?php echo $row['destino']; ?>'
							data-meloc='<?php echo $row['express_loc']; ?>'
							data-mseloc='<?php echo $row['superexpress_loc']; ?>'
                            data-mochi='<?php echo $row['ocurre_chi']; ?>' 
                            data-mechi='<?php echo $row['express_chi']; ?>'                           
                            data-msechi='<?php echo $row['superexpress_chi']; ?>' 
                            data-mome='<?php echo $row['ocurre_me']; ?>' 
                            data-meme='<?php echo $row['express_me']; ?>' 
                            data-mseme='<?php echo $row['superexpress_me']; ?>' 
                            data-mogra='<?php echo $row['ocurre_gra'];?>'
							data-megra='<?php echo $row['express_gra'];?>'
							data-msegra='<?php echo $row['superexpress_gra'];?>'
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