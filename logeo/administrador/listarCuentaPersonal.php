<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';

    if (isset($_POST['idp']))
    {
        $idp=$_POST['idp'];
        $query = $conn->query("SELECT *FROM tbls_auxiliar,tbls_personal,tbls_ccontable WHERE tbls_auxiliar.fk_personal=tbls_personal.id_personal AND tbls_auxiliar.fk_ccontable=tbls_ccontable.id_cc AND tbls_personal.id_personal='".$idp."'");
        $row=$query->fetch_assoc();
        $count=$query->num_rows;
        if($count>0)
        {
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color: #f5f5f5">
                        <th width="25%"><i class="fa fa-key" style="width: 16px"></i>CUENTA</th>
                        <th width="75%"><i class="fa fa-user" style="width: 16px"></i>DESCRIPCION</th>
                        <!--th width="5%"><center><i class="fa fa-trash" style="width: 16px"></i></center></th-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    do 
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['ccontable'];?>
                            </td>
                            <td>
                                <?php echo $row['descripcion'];?>
                            </td>
                            <!--td>
                                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="modalQuitarCP" data-delPC='<php echo $row['id_aux']; ?>'>
                                    <i class="fa fa-trash" style="width: 16px"></i>
                                </button>
                            </td-->
                        </tr>
                        <?php
                    }
                    while ($row = $query->fetch_assoc());
                    ?>
                </tbody>
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