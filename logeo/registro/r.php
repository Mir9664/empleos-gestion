<?php
require '../seguridad/conn_mysqli.php';
require '../seguridad/limpiar_string';
$op=$_POST['op'];
switch ($op) {
case '1': {//AGREGAR 
    
                $rfc=limpiar_string($_POST['rfc']);
                $nombre=limpiar_string($_POST['nombre']);
                $apellido=limpiar_string($_POST['apellido']);
                $edad=limpiar_string($_POST['edad']);
                $sexo=limpiar_string($_POST['sexo']);
                $email=limpiar_string($_POST['email']);
                $telefono=limpiar_string($_POST['telefono']);
                $direccion=limpiar_string($_POST['direccion']);
                $ciudad=limpiar_string($_POST['ciudad']);
                $usuario=limpiar_string($_POST['usuario']);
                $hash=limpiar_string($_POST['password']); 
                //$password= password_hash($hash, PASSWORD_DEFAULT);
              $password= md5($hash);

            $sql="select * from personal where rfcp='$rfc'";
            $result=$conn->query($sql);
            $nf=$result->num_rows;


            if($nf>0)
            {
                ?>
                <div class="alert alert-warning" alert>
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Warning!</strong> El registro ya existe.
                </div>
                <?php
            }else{

                    $sql_insert=$conn->query("INSERT INTO personal set rfcp='$rfc', nombrep='$nombre',apellido='$apellido',edadp=$edad,sexop='$sexo',emailp='$email',telp='$telefono',direccionp='$direccion',ciudadp='$ciudad',passwordp='$password',fk_puesto=$usuario");
                if ($sql_insert) 
                {
                    ?>
                    <div class="alert alert-success">
                         <strong>Success!</strong> Se ha guardado la información.
                    </div>
                    <?php
                       
                }
                else
                {
                    ?>
                    <div class="alert alert-warning" alert>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Warning!</strong> No se pudo Guardar.
                    </div>
                    <?php
                }
                    $conn->close();

        
    }
}break;
case '2': {
    
    echo "hola";

                $rfc=limpiar_string($_POST['rfcs']);
                $email=limpiar_string($_POST['emails']);
                $telefono=limpiar_string($_POST['tels']);
                $usuario=limpiar_string($_POST['usuarios']);
                $direccion=limpiar_string($_POST['dirs']);
                $ciudad=limpiar_string($_POST['ciudads']);
                $estado=limpiar_string($_POST['ests']);
                $hash=limpiar_string($_POST['spassword']); 
                //$password= password_hash($hash, PASSWORD_DEFAULT);
              $password= md5($hash);

            $sql="select * from emp where rfcs='$rfc'";
            $result=$conn->query($sql);
            $nf=$result->num_rows;


            if($nf>0)
            {
                ?>
                <div class="alert alert-warning" alert>
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Warning!</strong> El registro ya existe.
                </div>
                <?php
            }else{

                    $sql_insert=$conn->query("INSERT INTO emp set rfcs='$rfc',emails='$email',tels='$telefono',direccions='$direccion',ciudads='$ciudad',estados='$estado',spassword='$password',fk_puesto=$usuario");
                if ($sql_insert) 
                {
                    ?>
                    <div class="alert alert-success">
                         <strong>Success!</strong> Se ha guardado la información.
                    </div>
                    <?php
                       
                }
                else
                {
                    ?>
                    <div class="alert alert-warning" alert>
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Warning!</strong> No se pudo Guardar.
                    </div>
                    <?php
                }
                    $conn->close();



}
}break;
}
?>

