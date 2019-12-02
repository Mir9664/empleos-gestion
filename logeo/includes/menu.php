<?php
    $resInst=$conn->query("SELECT *FROM empresa");
    $we=$resInst->fetch_assoc();	
	$resultado=$conn->query("SELECT *,s.idsuc as suc FROM personal p, sucursales s 
	WHERE p.rfcp='".$_SESSION["usuarioactual"]."' and p.idsuc=s.idsuc");
    $resultado1=$conn->query("SELECT *,s.idsuc as suc FROM emp e, sucursales s 
    WHERE e.rfcs='".$_SESSION["usuarioactual"]."' and e.idsuc=s.idsuc");
    $mk=$resultado->fetch_assoc();
    $mk1=$resultado1->fetch_assoc();
	$nombres=$mk['nombres'];	
    $nivel=$mk['fk_puesto'];
	$_SESSION['nombres']=$nombres;	
    $nombres1=$mk1['nombres'];    
    $nivel1=$mk1['fk_puesto'];
    $_SESSION['nombres']=$nombres1;
?>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
	
    <a class="navbar-brand" href="../me/" id="imgPrincipal">
        <img src="../images/Logo.png" class="img-responsive" width="30px">		
    </a>	
</div>
<ul class="nav navbar-top-links navbar-right">
    <?php if ($nivel==1 || $nivel==2 || $nivel1==2): ?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="">
            <i style="width: 16px" class="fa fa-cog fa-fw"></i> Utilerias <i style="width: 16px" class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="../manual/Manual.pdf" target="_blank"><i style="width: 16px" class="fa fa-book"></i> Manual de Usuario</a>
            </li>
        </ul>
    </li>
    <?php endif ?>
    <?php
        if ($nivel==1) 
        {
            $tipo="Administrador";
        }
        if ($nivel==2) 
        {
            $tipo="Usuario";
        }
        if ($nivel1==2) 
        {
            $tipo="Usuario";
        }
    ?>
    <?php
        if ($nivel==1 || $nivel==2 || $nivel1==2)
        {
            ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="">
                    <i style="width: 16px" class="fa fa-user fa-fw"></i> <?php echo $_SESSION["usuarioactual"]; ?> (<?php echo $tipo; ?>) <i style="width: 16px" class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    
                    <li>
                        <a style="cursor: pointer;"><b><i style="width: 16px" class="fa fa-calendar"></i> <?php echo DiaFechaCompleta(); ?></b></a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../seguridad/" style="font-weight: bold;"><i style="width: 16px" class="fa fa-sign-out fa-fw"></i> SALIR DEL SISTEMA</a></li>
                </ul>
            </li>
            <?php
        }
    ?>
</ul>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav in" id="side-menu">
        <?php 
          
            if ($nivel==1) 
            {

               
                nivel2();
            }
            if ($nivel==2) 
            {
        
                nivel1();
            }
            if ($nivel1==2) 
            {
        
                nivel3();
            }
        ?>
        </ul>
    </div>
</div>
<?php
    function menu($nombres)
    {
        ?>
		<li class="sidebar-search">
            <strong><big><?php echo $nombres;?></big></strong>
        </li>        
        <?php
    }
   
    function nivel1()
    {
        ?>
        <li class="sidebar-search">
            <strong><big>Menú</big></strong>
        </li>
        <li>
            <a href="../personal/index.php"><i style="width: 16px" class="fa fa-users"></i> Empleado-Empleo</a>
        </li>
        <!--<li>
            <a href="../modificar/"><i style="width: 16px" class="fa fa-vcard"></i> Modificar Datos</a>
        </li>-->
               
        <li class="sidebar-search">
            <strong><a href="javascript:void()" data-toggle='modal' data-target='#modalAcerca' style="text-decoration: none;color:black;"><b><i style="width: 16px" class="fa fa-info"></i> ACERCA DE... <i style="width: 16px" class="fa fa-laptop"></i></b></a></strong>
        </li>
        <?php
    }
    function nivel2()
    {
		?>
        <li class="sidebar-search">
            <strong><big>Menú</big></strong>
        </li>
        <li>
            <a href="../personal/"><i style="width: 16px" class="fa fa-users"></i> Empleado-Empleo</a>
        </li>
        <li>
            <a href="../administrador/"><i style="width: 16px" class="fa fa-user"></i>Administrador </a>
        </li>		
        <li>
            <a href="../usuarios/"><i style="width: 16px" class="fa fa-vcard"></i> Control de Usuarios</a>
        </li>
		       
        <li class="sidebar-search">
            <strong><a href="javascript:void()" data-toggle='modal' data-target='#modalAcerca' style="text-decoration: none;color:black;"><b><i style="width: 16px" class="fa fa-info"></i> ACERCA DE... <i style="width: 16px" class="fa fa-laptop"></i></b></a></strong>
        </li>
        <?php
    }
    function nivel3()
    {
        ?>
        <li class="sidebar-search">
            <strong><big>Menú</big></strong>
        </li>
        <li>
            <a href="../empleado/index.php"><i style="width: 16px" class="fa fa-users"></i> Empresas</a>
        </li>
        <!--<li>
            <a href="../modificar/"><i style="width: 16px" class="fa fa-vcard"></i> Modificar Datos</a>
        </li>-->
               
        <li class="sidebar-search">
            <strong><a href="javascript:void()" data-toggle='modal' data-target='#modalAcerca' style="text-decoration: none;color:black;"><b><i style="width: 16px" class="fa fa-info"></i> ACERCA DE... <i style="width: 16px" class="fa fa-laptop"></i></b></a></strong>
        </li>
        <?php
    }
?>