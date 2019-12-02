<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    include '../includes/fechas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
    <title>Principal</title>
    <?php
        include '../includes/head.php';
    ?>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php
                include '../includes/menu.php';
            ?>
        </nav>
        <div id="page-wrapper"><br><br><br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-link">
                                <center>
                                <img src="../images/bienvenido_gif.gif" alt="">
                            </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../includes/foot.php';
    ?>
</body>
</html>