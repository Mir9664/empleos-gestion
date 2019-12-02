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
        $query = $conn->query("SELECT *FROM personal,sucursales s WHERE  personal.idsuc=s.idsuc AND idpersonal!=10");
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
                        <th><i class="fa fa-user" style="width: 16px"></i> APELLIDO</th>
                        <th><i class="fa fa-user" style="width: 16px"></i> EDAD</th>
                        <th><i class="fa fa-user" style="width: 16px"></i> SEXO</th>
                        <th><i class="fa fa-inbox" style="width: 16px"></i> EMAIL</th>
                        <th><i class="fa fa-phone" style="width: 16px"></i> TELEFONO</th>
						
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
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['edadp']; ?></td>
                        <td><?php echo $row['sexop']; ?></td>
                        <td><?php echo $row['emailp']; ?></td>
                        <td><?php echo $row['telp']; ?></td>
					
                    </tr>
                
                <?php
                }
                while ($row = $query->fetch_assoc());
                ?>
                </tbody>
                <tfoot align=center style='color:red'>
                    <tr>
                        <td colspan=9><b>
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