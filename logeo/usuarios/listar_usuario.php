<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';
    if (isset($_POST['valorBusqueda']))
    {
        $consultaBusqueda = $_POST['valorBusqueda'];
        $query = $conn->query("SELECT * FROM personal p 
		WHERE 
		p.rfcp LIKE '%$consultaBusqueda%' or 
		p.nombrep LIKE '%$consultaBusqueda%' 
		ORDER BY p.rfcp");
        mostrar($conn,$query);
    }
    else
    {
        $query = $conn->query("SELECT *	FROM personal p  ORDER BY p.rfcp");
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
                    <tr>
                        <th>USUARIO [ RFC ]</th>
                        <th>NOMBRE</th>
                        
                        <th style="text-align: right">ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                do
                {                    
					$puesto=$row['fk_puesto']; 
					include '../funciones/puesto.php';                    
                    ?>
                    <tr>
                        <td><?php echo $row['rfcp']; ?></td>
                        <td><?php echo $row['nombrep']; ?></td>
                     
                        <td align="center">
                            <button class="btn btn-warning btn-xs" 
							data-toggle='modal' 
							data-target='#modUser' 
							data-idp='<?php echo $row['idpersonal']; ?>' 
							data-rfcp='<?php echo $row['rfcp']; ?>' 
							data-nombrep='<?php echo $row['nombrep']; ?>'
							>
                                <i class="fa fa-refresh"></i>
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
                                if ($count>1)
                                {
                                    echo "Se Encontraron: ".$count." Usuarios";
                                }
                                else
                                {
                                    echo "Se Encontro: ".$count." Usuario";
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