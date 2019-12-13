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
        $query = $conn->query("SELECT *FROM personal,sucursales s WHERE  personal.idsuc=s.idsuc ");
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
                        <th><i class="fa fa-sort-alpha-asc" style="width: 16px"></i> RFC O CURP</th>
                        <th><i class="fa fa-user" style="width: 16px"></i> NOMBRE</th>
                        <th style="text-align: center;"><i class="fa fa-edit" style="width: 16px"></i> ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                do 
                {
                ?>
                    <tr>
                        <td><?php echo $row['rfcp']; ?></td>
                        <td><?php echo $row['nombrep']; ?></td>
                       
                       <td align="center" width="8%">
							 <button 
							class="btn btn-warning btn-xs" data-toggle='modal' data-target='#modPersonal' 
							data-midp='<?php echo $row['idpersonal'];  ?>' 
                            data-mrfc='<?php echo $row['rfcp']; ?>' 
                            data-mnom='<?php echo $row['nombrep']; ?>'
							data-medad='<?php echo $row['edadp']; ?>'
							data-msex='<?php echo $row['sexop']; ?>'
                            data-mema='<?php echo $row['emailp']; ?>' 
                            data-mtel='<?php echo $row['telp']; ?>'                           
                            data-mdir='<?php echo $row['direccionp']; ?>' 
                            data-mciu='<?php echo $row['ciudadp']; ?>' 
                            data-mpue='<?php echo $row['fk_puesto'];?>'
							data-msuc='<?php echo $row['idsuc'];?>'> 
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
                        <td colspan=7><b>
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