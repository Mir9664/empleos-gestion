<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
	require '../seguridad/seguridadadmon.php';
    require '../includes/generaCeros.php';
    require '../includes/numeros.php';
    require '../includes/fechas.php';

    $resInst=$conn->query("SELECT *FROM empresa");
    $we=$resInst->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SS- [Usuarios]</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php
        include '../includes/head.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#cargar_usuario").load("listar_usuario.php");
            $("#critBUser").change(function()
            {
                if($("#critBUser").val()=="sel1")
                {
                    $("#msgBUser").show();
                    $("#txt_usuario").hide();
                    $("#txt_usuario").val("");
                    $("#cargar_usuario").hide();
                }
                if($("#critBUser").val()=="all1")
                {
                    $("#cargar_usuario").show();
                    $("#cargar_usuario").load("listar_usuario.php");
                    $("#txt_usuario").hide();
                    $("#txt_usuario").val("");
                    $("#msgBUser").hide();
                }
                if($("#critBUser").val()=="bin1")
                {
                    $("#txt_usuario").show();
                    $("#txt_usuario").val("");
                    $("#txt_usuario").focus();
                    $("#cargar_usuario").show();
                    $("#msgBUser").hide();
                }
            });
        });
        function buscarAlumno() 
        {
            var textoBusqueda = $("input#txt_usuario").val();
            if (textoBusqueda != "") 
            {
                $.post("listar_usuario.php", {valorBusqueda: textoBusqueda}, function(mensaje) 
                {
                    $("#cargar_usuario").html(mensaje);
                });
            }
        }
    </script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php
                include '../includes/menu.php';
            ?>
        </nav>
        <div id="page-wrapper"><br><br><br><br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <b>CONTROL DE USUARIOS</b>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#usuarios" data-toggle="tab"><b><i style="width: 16px" class="fa fa-users"></i> Usuarios</b></a></li>
                            </ul>
                            <div class="tab-content">
                            	<div class="tab-pane fade in active" id="usuarios"><br>
                                    <div class="col-md-4">
                                        <select name="critBUser" id="critBUser" class="form-control">
                                            <option value="sel1">Seleccione una opción</option>
                                            <option value="all1">Ver Todos</option>
                                            <option value="bin1">RFC/Nombre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="txt_usuario" id="txt_usuario" class="form-control" placeholder="Texto" onKeyUp="buscarAlumno();" autofocus="true" style="display: none;">
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <label id="msgBUser" style="color: red;display: none;"><b>Elija una opcion</b></label>
                                    </div>
                                    <!--<div class="col-md-3" align="right">
                                        <button class="btn btn-primary btn-block btn-xs" data-toggle="modal" data-target="#dataAddUser"><i style="width: 16px" class="fa fa-user"></i> Nuevo Usuario</button>
                                    </div>-->
                                    <br><br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="table-responsive">
                                                    <div class="cargar_usuario" id="cargar_usuario"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
   
    <!--MODIFICAR USUARIO-->
    <div class="col-md-12">
        <div class="modal fade" id="modUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Password de Usuario</h5>
                        <div id="load_ajax_mUser" align="center"></div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="idp" name="idp">
                       	<h6>Ususario y Nombre:</h6>
						 <div class="form-group">
                            <input type="text" name="rfcp" id="rfcp" disabled
							class="form-control" placeholder="Usuario">
                        </div>
						<h6>Password:</h6>
                        <div class="form-group">
                            <input type="password" name="contras" id="contras" class="form-control" placeholder="Contraseña">
                        </div>
						<h6>Confirmar Password:</h6>
                        <div class="form-group">
                            <input type="password" name="contras1" id="contras1" class="form-control" placeholder="Confirmar Contraseña">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button id="btnUpdUser" class="btn btn-primary"><i class="fa fa-refresh"></i> Modificar</button>
                        <!--<button id="btnDelUser" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>-->
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiUser"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../includes/foot.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#tipo_personal").change(function()
            {
                $.ajax({
                    url: 'ajax.php',
                    type: 'POST',
                    data: {dato_idP: $("#tipo_personal").val()},
                    success: function(datos) 
                    {
                        $("#mostrarRFC").html(datos);
                        $("#co1").focus();
                    }
                });
            });
            $('#modUser').on('show.bs.modal',function(event)
            {
                var button = $(event.relatedTarget)
                var idp = button.data('idp')
                var rfcp = button.data('rfcp')
                var nombrep = button.data('nombrep')
				var modal = $(this)
                modal.find('#idp').val(idp)
                modal.find('#rfcp').val(rfcp+"-"+nombrep)                                
            });
            $("#btnUpdUser").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {
					dat_op:27,
					idp: $("#idp").val(),
					pass1: $("#contras").val(),
					pass2: $("#contras1").val()
					},
					beforeSend: function() 
                    {
                        $("#load_ajax_mUser").html("<img src='../images/gif-load (1).gif'><br>Actualizando los Datos");
                        $("#btnExiUser").hide();
                        $("#btnUpdUser").hide();
                        $("#btnDelUser").hide();
                        
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mUser").html(datos);
                        $("#btnExiUser").show();
                        $("#btnUpdUser").show();
                        $("#btnDelUser").show();
                        $("#cargar_usuario").load("listar_usuario.php");
                    }
                });
            });
            
            $("#btn_passguardar").click(function(event)
            {
                conf_na=$("#conf_name").val();
                conf_id=$("#conf_id").val();
                conf_p1=$("#conf_pass1").val();
                conf_p2=$("#conf_pass2").val();
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {us_na: conf_na,us_id: conf_id, us_p1: conf_p1, us_p2: conf_p2},
                    beforeSend: function(){
                        $("#btn_passexit").hide();
                        $("#btn_passguardar").hide();
                        $("#btn_passvolver").hide();
                        $("#msgPass").html("<img src='../images/gif-load (1).gif'><br>Cargando Datos");
                    },
                    success: function(datoss){
                        $("#msgPass").html(datoss);
                        $("#btn_passexit").show();
                        $("#btn_passvolver").hide();
                        $("#btn_passguardar").hide();
                    },
                    error: function(){
                        $("#msgPass").html("Ha ocurrido un error");
                        $("#btn_passexit").show();
                    },
                });
            });
        });
    </script>
</body> 
</html>