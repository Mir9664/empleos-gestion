<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';
    if (isset($_POST['valorBusqueda']))
    {
        $consultaBusqueda = $_POST['valorBusqueda'];
        $query = $conn->query("SELECT *FROM puesto WHERE puesto LIKE '%$consultaBusqueda%' ORDER BY idpuesto");
        mostrar($conn,$query);
    }
    else
    {
        $query = $conn->query("SELECT *FROM puesto ORDER BY idpuesto");
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
                        <th>
						<i class="fa fa-sort-alpha-asc" style="width: 16px"></i>
						ID
						</th>
                        <th>
						<i class="fa fa-sitemap" style="width: 16px"></i> 
						PUESTO
						</th>
                        <th style="text-align: right">
						<i class="fa fa-edit" style="width: 16px"></i>
						ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                do 
                {
                    ?>
                    <tr>
                        <td><?php echo $row['idpuesto']; ?></td>
                        <td><?php echo $row['puesto']; ?></td>
                        <td align="right">
                            <button class="btn btn-warning btn-xs" data-toggle='modal' data-target='#modPuesto' data-idc='<?php echo $row['idpuesto']; ?>' data-pue='<?php echo $row['puesto']; ?>'><i class="fa fa-refresh"></i> | <i class="fa fa-trash"></i></button>
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