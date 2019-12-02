<?php
    require 'seguridad/conn_mysqli.php';
    require 'includes/fechas.php';
   
    $resultado=$conn->query("SELECT *FROM empresa");
    $we=$resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Empleo.com</title>
    <meta charset="utf-8">
    <script type="text/javascript">{if(history.forward(1)){location.replace(history.forward(1))}}</script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SisMobile">
    <link rel="shortcut icon" href="images/Logo (Copiar).png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/metisMenu.min.css">
    <link rel="stylesheet" type="text/css" href="css/timeline.css">
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.css">
    <link rel="stylesheet" type="text/css" href="css/morris.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/alertify.css">
    <link rel="stylesheet" href="css/themes/semantic.css">
    <script src="js/alertify.js"></script>   
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#sqlLog").click(function(event)
            {
                $.ajax({
                    url: "seguridad/controlAjax.php",
                    type: "POST",
                    data: {use : $("#user").val(), pas : $("#pass").val()},
                    beforeSend: function(objeto)
                    {
                        $("#mensajeLog").html("ENVIANDO...");
                    },
                    success: function(c)
                    {
                        $("#mensajeLog").html(c);
                        $("#user").focus();
                        $("#user").val("");
                        $("#pass").val("");
                    }
                });
                event.preventDefault();
            });
        });
    </script>
    <style type="text/css">
        body{font-family: calibri;}
        input{letter-spacing: 3px;text-align: center;}
    </style>
</head>
<body>
   

    


    <div id="login-overlay" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="right">
                
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5" align="center">
                    
                        <img src="images/Logo.png" class="img-responsive" style="width: 120px;max-width: auto;" ><br>
                        <i class="fa fa-vcard-o"></i> Empleos.com<br>
                    </div>
                    <div class="col-md-7">
                        <div class="well">
                            <div id="form-login" style="display:block">
                                <div id="mensajeLog" align="center" style="color:red;font-weight: bold;height: 25px"></div>
                                <legend><center>Iniciar Sesión</center></legend>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input type="text" name="user" id="user" class="form-control" placeholder="RFC O CURP" autofocus="" autocomplete="false" autosave="off">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                    <input type="password" name="pass" id="pass" class="form-control" maxlength="25" placeholder="Contraseña" autocomplete="false" autosave="off">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" id="sqlLog">Iniciar <i class="fa fa-sign-in"></i></button>
                                    <button onclick="location.href='registro/index.php'" class="btn btn-secundary btn-block">Crear Cuenta</button>
                                </div>
<!--
                                        </br>
                                     <div class="col-md-12" align="center">
                                        <button class="btn btn-secondary btn-block btn-xs" data-toggle='modal' data-target='#addSucursal' ><i style="width: 16px" class="fa fa-suitcase"></i> Nueva Empresa-Empleo</button>
                                    </div> 
                                PERSONAL
                                <div class="col-md-12" align="center">
                                        <button id="ap1" class="btn btn-secondary btn_block btn-xs" >
                                        <i style="width: 16px" class="fa fa-briefcase"></i> 
                                        Nuevo Empleado</button><br><br>
                                    </div>
                                <div class="tab-pane fade in active" id="tab_per"><br>
                                    
-->
                                  
                                    
                                <div class="tab-pane fade in active" id="tab_per"><br>
                                </div>                    
                                   
                                
                                <?php
                                    $res_user=$conn->query("SELECT *FROM personal");
                                    $row=$res_user->fetch_assoc();
                                    $ccon=$res_user->num_rows;
                                    $val=$row['rfcp'];
                                    $pa1=$row['passwordp'];
                                    if ($ccon>0)
                                    {
                                        if($val=="admin" && $pa1=='admin')
                                        {
                                            echo "USUARIO: <b>".$val."</b> "."PASSWORD: <b>".$pa1."</b>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <b><a href="../index.html">Volver a Inicio</a>
                    </div>
                    <div class="col-md-5" align="right">
                        <b><?php echo DiaFechaCompleta(); ?></b>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">


        $(document).ready(function()
        {
            $("#btnAddPersonal").click(function()
            {
                $.ajax({
                    url: 'funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:1,
                        dat_rfc: $("#txt_rfc").val(),
                        dat_nom: $("#txt_nombre").val(),
                        dat_ema: $("#txt_email").val(),
                        dat_tel: $("#txt_telefono").val(),
                        dat_edad: $("#txt_edad").val(),
                        dat_sex: $("#sel_sexo").val(),
                        dat_dir: $("#txt_direccion").val(),
                        dat_ciu: $("#txt_ciudad").val(),
                        dat_est: $("#txt_estado").val(),
                        dat_cred: $("#txt_credencial").val(),
                        dat_pue: $("#sel_puesto").val(),
                        dat_suc: $("#sel_suc").val()},
                    
                    beforeSend: function()
                    {
                        $("#load_ajax").html("<img src='images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btn_salir_aPersonal").hide();
                        //$("#btnAddPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax").html(datos);
                        $("#btn_salir_aPersonal").show();
                        //$("#btnAddPersonal").hide();
                        $("#modPersonal").modal("toggle");
                        $("#cargar_personal").load("personal/listarPersonal.php");
                    },
                });
            });
            $('#modPersonal').on('show.bs.modal',function(event)
            {                
                
                var button = $(event.relatedTarget)
                var midp = button.data('midp')
                var mrfc = button.data('mrfc')
                var mnom = button.data('mnom')
                var mema = button.data('mema')
                var mtel = button.data('mtel')
                var medad = button.data('medad')
                var msex = button.data('msex')
                var mdir = button.data('mdir')
                var mciu = button.data('mciu')
                var mest = button.data('mest')
                var mcre = button.data('mcre')
                var mpue = button.data('mpue')
                var msuc = button.data('msuc')
                var modal = $(this)
                modal.find('#txtm_idp').val(midp)
                modal.find('#txtm_rfc').val(mrfc)
                modal.find('#txtm_nombre').val(mnom)
                modal.find('#txtm_email').val(mema)
                modal.find('#txtm_telefono').val(mtel)
                modal.find('#txtm_edad').val(medad)
                modal.find('#selm_sexo').val(msex)
                modal.find('#txtm_dir').val(mdir)
                modal.find('#txtm_ciu').val(mciu)
                modal.find('#txtm_est').val(mest)
                modal.find('#txtm_cre').val(mcre)
                modal.find('#selm_puesto').val(mpue)    
                modal.find('#selm_suc').val(msuc)   
            });
            
            });
      </script>      
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/metisMenu.min.js"></script>
    <script type="text/javascript" src="js/raphael-min.js"></script>
    <script type="text/javascript" src="js/sb-admin-2.js"></script>
</body>
</html>