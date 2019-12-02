<?php
    require 'conn_mysqli.php';
    require 'functions.php';
    if (isset($_POST['use']) || isset($_POST['pas']))
    {
        $name=$_POST['use'];
        $pass=$_POST['pas'];
        if ($name=="" || $pass=="")
        {
            ?>
            <label style='color:red'>
                <b>Campo Vacio</b>
            </label>
            <?php
        }
        else
        {
		    $sql_user="SELECT *FROM personal WHERE rfcp = '".$name."' AND passwordp = '".md5($pass)."'";
             $sql_user1="SELECT *FROM emp WHERE rfcs = '".$name."' AND spassword = '".md5($pass)."'";
            if (!($resultado=$conn->query($sql_user)))
            {
                mostrarError($conn,$sql_user);
            }
            if (!($resultado1=$conn->query($sql_user1)))
            {
                mostrarError($conn,$sql_user1);
            }

            $feclave=$resultado->fetch_assoc();
            $tipo_user=$feclave['fk_puesto'];
			$idp=$feclave['idpersonal'];
            $feclave1=$resultado1->fetch_assoc();
            $tipo_user1=$feclave1['fk_puesto'];
            $ide=$feclave1['ide'];

            if ($feclave['rfcp'] && $feclave['passwordp'])
            {
                if ($tipo_user==1)
                {
                    session_start();
                    $_SESSION['s2cd0rf1it8t'] = 1;
                    $_SESSION["usuarioactual"] = $feclave['rfcp'];
					$_SESSION['tp'] = $tipo_user;
					$_SESSION['idp'] = $idp;
                    echo "<script>window.location.href='me/';</script>";
                }
                if ($tipo_user==2)
                {
                    session_start();
                    $_SESSION['s2cd0rf1it8t'] = 1;
                    $_SESSION["usuarioactual"] = $feclave['rfcp'];
					$_SESSION['tp'] = $tipo_user;
					$_SESSION['idp'] = $idp;
                    echo "<script>window.location.href='me/';</script>";
                }
            }
            if ($feclave['rfcp'] && $feclave['passwordp'])
            {
                
                if ($tipo_user==2)
                {
                    session_start();
                    $_SESSION['s2cd0rf1it8t'] = 1;
                    $_SESSION["usuarioactual"] = $feclave['rfcp'];
                    $_SESSION['tp'] = $tipo_user;
                    $_SESSION['idp'] = $idp;
                    echo "<script>window.location.href='me/';</script>";
                }
            }
            // Aqui pegue lo de la empresa
            if ($feclave1['rfcs'] && $feclave1['spassword'])
            {
                
                
                    session_start();
                    $_SESSION['s2cd0rf1it8t'] = 1;
                    $_SESSION["usuarioactual"] = $feclave1['rfcs'];
                    $_SESSION['tp'] = $tipo_user1;
                    $_SESSION['idp'] = $ids;
                    echo "<script>window.location.href='me/';</script>";
            
            }

            else
            {
                ?>
                <label style='color:red'>
                    <b>Datos Incorrectos.</b>
                </label>
                <?php
            }
        }
    }
?>