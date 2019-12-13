<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';
    if (isset($_POST['valorBusqueda']))
    {
        $consultaBusqueda = $_POST['valorBusqueda'];         
        $query = $conn->query("SELECT *FROM personal,tbls_puesto,tbls_departamentos  WHERE personal.fk_puesto=tbls_puesto.id_puesto AND personal.fk_depto=tbls_departamentos.id_depto AND (personal.rfcp LIKE '%$consultaBusqueda%' OR personal.nombrep LIKE '%$consultaBusqueda%'  OR personal.emailp LIKE '%$consultaBusqueda%' OR personal.telp LIKE '%$consultaBusqueda%' OR personal.sexop LIKE '%$consultaBusqueda%')");
        mostrar($conn,$query);
       }
    else
    {
        $query = $conn->query("
		SELECT *, l.idsuc as suc FROM lineastransportistas l, sucursales s
		where
		l.idsuc=s.idsuc
		");
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
                        <th><i class="fa fa-user" style="width: 16px"></i>CLAVE</th>
						<th><i class="fa fa-bus" style="width: 16px"></i>LINEA</th>
						<th><i class="fa fa-address-card-o" style="width: 16px"></i>CONTACTO</th>
						<th><i class="fa fa-wpforms" style="width: 16px"></i>DIRECCION</th>
						<th><i class="fa fa-phone-square" style="width: 16px"></i>TELEFONO</th>
						<th><i class="fa fa-mail-forward" style="width: 16px"></i>EMAIL</th>
						<th><i class="fa fa-institution" style="width: 16px"></i>Sucursal</th>	
						<th><i class="fa fa-tasks" style="width: 16px"></i>Estado</th>							
                        <th style="text-align: center;"><i class="fa fa-edit" style="width: 16px"></i> ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                do 
                {
                ?>
                    <tr>
                        <!--td align="center">
                            <button class="btn btn-success btn-xs" data-toggle='modal' data-target='#asigCuentasC'
                                data-midcaddc='<?php echo $row['id_personal']; ?>'
                                data-mrfcaddc='<?php echo $row['rfc']; ?>'
                                data-mnomaddc='<?php echo $row['nombre']; ?>'
                                data-mapeaddc='<?php echo $row['apellidos']; ?>'
                            ><i class="fa fa-key"></i></button>
                        </td-->
						<td><?php echo $row['idlineat']; ?></td>
                        <td><?php echo $row['clavel']; ?></td>
                        <td><?php echo $row['linea']; ?></td>
						<td><?php echo $row['contacto']; ?></td>
						<td><?php echo $row['direccion']; ?></td>
						<td><?php echo $row['telefono']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['nombres']; ?></td>
						<td><?php echo $row['estado']; ?></td>
                       <td align="right" width="8%">
							 <button class="btn btn-warning btn-xs" data-toggle='modal' data-target='#modAutotransporte' 
							data-midautotrans='<?php echo $row['idlineat'];  ?>' 
							data-mclauto='<?php echo $row['clavel'];  ?>' 
                            data-mautotrans='<?php echo $row['linea']; ?>' 
                            data-mcontactol='<?php echo $row['contacto']; ?>'
							data-memaila='<?php echo $row['email']; ?>'
							data-mtela='<?php echo $row['telefono']; ?>'
							data-mdirsa='<?php echo $row['direccion']; ?>'
							data-sucautotrans='<?php echo $row['suc']; ?>'
							data-mesta='<?php echo $row['estado']; ?>'>
							<i class="fa fa-refresh"></i> | <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                
                <?php
                }
                while ($row = $query->fetch_assoc());
                ?>
                </tbody>
                <tfoot align=center style='color:red'>
                    <tr>
                        <td colspan=10><b>
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