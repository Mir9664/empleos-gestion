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
        $query = $conn->query("SELECT *FROM sucursales");
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
                        <th><i class="fa fa-sort-alpha-asc" style="width: 16px"></i>EMPLEO</th>
                        <th><i class="fa fa-institution" style="width: 16px"></i>EMPRESA</th>
                        <th><i class="fa fa-mail-forward" style="width: 16px"></i>EMAIL</th>
						<th><i class="fa fa-phone-square" style="width: 16px"></i>TELEFONO</th>
                        <th><i class="fa fa-map-marker" style="width: 16px"></i>DIRECCION</th>
                        <th style="text-align: center;"><i class="fa fa-file" style="width: 16px"></i> CV</th>
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
                        <td><?php echo $row['claves']; ?></td>
                        <td><?php echo $row['nombres']; ?></td>
						<td><?php echo $row['emails']; ?></td>
                        <td><?php echo $row['tels']; ?></td>
                        <td><?php echo $row['direccions']; ?></td>
                       <td align="right" width="8%">
							 <button  class="btn btn-warning btn-xs" data-toggle='modal' data-target='#modSucursal' >                           
							<i class="fa fa-file"></i></button>
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