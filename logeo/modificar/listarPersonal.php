<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';
$op=$_POST['dat'];
switch ($op) {
case '2': {//MODIFICAR PERSONAL
    if (
    isset($_POST['dat_midp']) || 
    isset($_POST['dat_mrfc']) || 
    isset($_POST['dat_mnom']) || 
    isset($_POST['dat_mema']) || 
    isset($_POST['dat_mtel']) || 
    isset($_POST['dat_medad']) || 
    isset($_POST['dat_msex']) ||
    isset($_POST['dat_mdir']) ||
    isset($_POST['dat_mciu']) ||
    isset($_POST['dat_mest']) || 
    isset($_POST['dat_mcre']) || 
    isset($_POST['dat_mpue']) || 
    isset($_POST['dat_msuc']) )
    {
        $midp=$_POST['dat_midp'];
        $mrfc=$_POST['dat_mrfc'];
        $mnom=$_POST['dat_mnom'];
        $mema=$_POST['dat_mema'];
        $mtel=$_POST['dat_mtel'];
        $msex=$_POST['dat_msex'];
        $mdir=$_POST['dat_mdir'];
        $mciu=$_POST['dat_mciu'];
        
        $sql_update=$conn->query("UPDATE personal SET rfcp='".$mrfc."',nombrep='".$mnom."',direccionp='".$mdir."',emailp='".$mema."',telp='".$mtel."',sexop='".$msex."',ciudadp='".$mciu."' WHERE idpersonal=".$midp);
        if ($sql_update) 
        {
            ?>
            <div class="alert alert-success">
                         <strong>Success!</strong> Se ha modificado la información.
            </div>
            <?php
        }
        else
        {
            ?>
            <div class="alert alert-warning">
                 <div class="alert alert-success">
                         <strong>Success!</strong> Se ha modificado la información.
            </div> Error al guardar. <?php echo $conn->error; ?>
            </div>          
            <?php
        }
    }
}break;

}
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