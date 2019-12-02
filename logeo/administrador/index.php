<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
	require '../seguridad/seguridadadmon.php';
    require '../includes/generaCeros.php';
    require '../includes/numeros.php';
    require '../includes/fechas.php';

    $resInst=$conn->query("SELECT *FROM empresa");
    $we=$resInst->fetch_assoc();
    $date=date('Y');
    $matriz1 = str_split($date);
    $uno=$matriz1[0];
    $dos=$matriz1[1];
    $tre=$matriz1[2];
    $cua=$matriz1[3];
    $anio=$uno.$tre.$cua;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
    <?php
        include '../includes/head.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#cargar_personal").load("listarPersonal.php");
			$("#cargar_sucursal").load("listarSucursal.php");
			$('#suc23').load('selectModPersonal2.php');
            $("#critBPer").change(function()
            {
                if($("#critBPer").val()=="")
                {
                    $.alert("Seleccione una Opcion");
                    $("#divInfo").hide();
                    $("#cargar_personal").hide();
                }
                if($("#critBPer").val()=="all1")
                {
                    $("#divInfo").hide();
                    $("#cargar_personal").load("listarPersonal.php");
                }
                if($("#critBPer").val()=="bin1")
                {
                    $("#divInfo").show();
                    $("#txt_personal").focus();
                }
            });
            $("#critBPue").change(function()
            {
                if($("#critBPue").val()=="sel2")
                {
                    $("#msgBPue").show();
                    $("#txt_puesto").hide();
                    $("#txt_puesto").val("");
                    $("#cargar_puesto").hide();
                }
                if($("#critBPue").val()=="all2")
                {
                    $("#cargar_puesto").show();
                    $("#cargar_puesto").load("listarPuesto.php");
                    $("#txt_puesto").hide();
                    $("#txt_puesto").val("");
                    $("#msgBPue").hide();
                }
                if($("#critBPue").val()=="bin2")
                {
                    $("#txt_puesto").show();
                    $("#txt_puesto").val("");
                    $("#txt_puesto").focus();
                    $("#cargar_puesto").show();
                    $("#msgBPue").hide();
                }
            });
            $("#btnMostrarCP").click(function()
            {
                mostrarCP();
                $("#selm_cuentacc").focus();
            });
            $("#btnAgregarCP").click(function(event)
            {
                if (validoFrmAsigCC())
                {
                    val1=$("#txtm_midc").val();
                    val2=$("#selm_cuentacc").val();
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        data: {idp: val1,idc: val2},
                        beforeSend: function()
                        {
                            $("#listarCuentaPersonal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        },
                        success: function(datos) 
                        {
                            $("#listarCuentaPersonal").html(datos);
                            mostrarCP();
                            $("#selm_cuentacc").focus();
                        },
                    });
                }
            });
            $("#btnLimpiarCP").click(function()
            {
                $("#selm_cuentacc").val("");
                $("#selm_cuentacc").focus();
            });
        });
        function validoFrmAsigCC()
        {
            if($("#txtm_mrfc").val()=="")
            {
                $("#msgac1").show();$("#msgac2").hide();$("#msgac3").hide();
                $("#txtm_mrfc").focus();
                return false;
            }
            if($("#txtm_mcur").val()=="")
            {
                $("#msgac1").hide();$("#msgac2").show();$("#msgac3").hide();
                $("#txtm_mcur").focus();
                return false;
            }
            if($("#selm_cuentacc").val().trim()==="")
            {
                $("#msgac1").hide();$("#msgac2").hide();$("#msgac3").show();
                $("#selm_cuentacc").focus();
                return false;
            }
            else
            {
                $("#msgac1").hide();$("#msgac2").hide();$("#msgac3").hide();
                return true;
            }
        }
        function buscarPersonal() 
        {
            var textoBusqueda = $("input#txt_personal").val();
            if (textoBusqueda != "") 
            {
                $.post("listarPersonal.php", {valorBusqueda: textoBusqueda}, function(mensaje) 
                {
                    $("#cargar_personal").html(mensaje);
                });
            }
        }
        function buscarPuesto() 
        {
            var textoBusqueda = $("input#txt_puesto").val();
            if (textoBusqueda != "") 
            {
                $.post("listarPuesto.php", {valorBusqueda: textoBusqueda}, function(mensaje) 
                {
                    $("#cargar_puesto").html(mensaje);
                });
            }
        }
        function mostrarCP()
        {
            vali_id=$("#txtm_midc").val();
            $.ajax({
                url: 'listarCuentaPersonal.php',
                type: 'POST',
                data: {idp: vali_id},
                success: function(datos) 
                {
                    $("#listarCuentaPersonal").html(datos);
                },
            });
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
		<div id="page-wrapper"><br><br><br><br>
			<div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissable" id="msg" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <br>
                    </div>
                	<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <b>[ADMINISTRADOR]</b><div id="mensaje"></div>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_per" id="tabp" data-toggle="tab" tabindex="1"><b><i style="width: 16px" class="fa fa-users"></i> Personal</b></a>
                                </li>
								 <li>								
                                    <a href="#tab_suc" data-toggle="tab" tabindex="3"><b><i style="width: 16px" class="fa fa-institution"></i> Empresa</b></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab_per"><br>
                                    <div class="col-md-4">
                                        <select name="critBPer" id="critBPer" class="form-control" autofocus="">
                                            <option value="">Seleccione una opción</option>
                                            <option value="all1">Ver Todos</option>
                                            <option value="bin1">Buscar Persona</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="display: none" id="divInfo">
                                        <input type="text" name="txt_personal" 
										id="txt_personal" class="form-control" 
										placeholder="Texto" onKeyUp="buscarPersonal();" 
										autofocus="true">
                                    </div>
                                    <div class="col-md-12" align="right">
										<button id="ap1" class="btn btn-primary btn_block btn-xs" >
										<i style="width: 16px" class="fa fa-user"></i> 
										Nueva Persona</button><br><br>
                                    </div>
                                    <br><br>
                                    <div id="cargar_personal" align="center">
									<!--AQUI ES DONDE SE LISTA EL PERSONAL-->
									</div>
                                </div>								
								
								<!--SUCURSALES-->
								<div class="tab-pane fade" id="tab_suc"><br>
									 <div class="col-md-4">
                                        <select name="critBSuc" id="critBSuc" class="form-control">
                                            <option value="sel2">Seleccione una opción</option>
                                            <option value="all2">Ver Todas</option>
                                            <option value="bin2">Empresa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="txt_sucursal" id="txt_sucursal" class="form-control" placeholder="Texto" onKeyUp="buscarSucursal();" autofocus="true" style="display: none;">
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <label id="msgBSuc" style="color: red;display: none;"><b>Elija una opcion</b></label>
                                    </div>
                                    <div class="col-md-3" align="right">
                                        <button class="btn btn-primary btn-block btn-xs" data-toggle='modal' data-target='#addSucursal' ><i style="width: 16px" class="fa fa-suitcase"></i> Nueva Empresa</button>
                                    </div>
                                    <br><br>
                                    <div class="table-responsive">
                                        <div class="cargar_sucursal" id="cargar_sucursal"></div>
                                    </div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<?php
        include 'nuevoPersonal.php';       
    ?>	
    <!--NUEVO PUESTO-->
    <div class="col-md-12">
        <div class="modal fade" id="addPuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-suitcase"></i> Nuevo Puesto</h5>
                        <div id="load_ajax_puesto" align="center"></div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="txtA_puesto" id="txtA_puesto" class="form-control" placeholder="Puesto" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAddPuesto" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_salirA_puesto"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MODIFICAR-ELIMINAR PUESTO-->
    <div class="col-md-12">
        <div class="modal fade" id="modPuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar/Eliminar Puesto</h5>
                        <div id="load_ajax_mpuesto" align="center"></div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="txtU_idc" id="txtU_idc" class="form-control">
                            <input type="text" name="txtU_pue" id="txtU_pue" class="form-control" placeholder="PUESTO" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnUpdPuesto" class="btn btn-primary"><i class="fa fa-refresh"></i> Modificar</button>
                        <button id="btnDelPuesto" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiPuesto"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--NUEVA SUCURSAL -->
    <?php
        include 'nuevaSucursal.php';
        include '../includes/foot.php';
    ?>
    <script type="text/javascript">

    	$(document).ready(function()
    	{
			//PARA ACTUALIZAR SELECT DE MODIFICAR PERSONAL
			$('#tabp').click(function(){
				$('.modal-body22').load('puesuc.php',function(){
					$('#myModal22').modal({show:false});
					$('#suc23').load('selectModPersonal2.php');
				});				
			});	
			//PARA ACTUALIZAR SELECT DE NUEVO PERSONAL
			$('#ap1').click(function(){
				$('.modal-body22').load('puesuc.php',function(){
					$('#myModal22').modal({show:true});
					$('#suc23').load('selectModPersonal2.php');
				});				
			});	
		
			$("#btnAddPersonal").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
					data: {dat_op:1,dat_rfc: $("#txt_rfc").val(),dat_nom: $("#txt_nombre").val(),dat_ema: $("#txt_email").val(),dat_tel: $("#txt_telefono").val(),dat_edad: $("#txt_edad").val(),dat_sex: $("#sel_sexo").val(),dat_dir: $("#txt_direccion").val(),dat_ciu: $("#txt_ciudad").val(),dat_est: $("#txt_estado").val(),dat_cred: $("#txt_credencial").val(),dat_pue: $("#sel_puesto").val(),dat_suc: $("#sel_suc").val()},
                    //data: {dat_rfc: $("#txt_rfc").val(),dat_cur: $("#txt_curp").val(),dat_cla: $("#txt_cla").val(),dat_nom: $("#txt_nombre").val(),dat_app: $("#txt_apellido").val(),dat_ema: $("#txt_email").val(),dat_tel: $("#txt_telefono").val(),dat_sex: $("#sel_sexo").val(),dat_pro: $("#txt_profesion").val(),dat_pue: $("#sel_puesto").val(),dat_dep: $("#sel_depto").val(),dat_ccu: $("#sel_ccuenta").val(),dat_sum: $("#txt_sueldom").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btn_salir_aPersonal").hide();
                        //$("#btnAddPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax").html(datos);
                        $("#btn_salir_aPersonal").show();
                        //$("#btnAddPersonal").hide();
						$("#modPersonal").modal("toggle");
                        $("#cargar_personal").load("listarPersonal.php");
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
			 /*NUEVO AUTOTRANSPORTE*/
            $("#btnAddAutotrans").click(function()
            {
			alert($("#smautotrans").val())
			 $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:41,
					ca: $("#clauto").val(),
					au: $("#autotrans").val(),
					cont: $("#contactol").val(),
					em: $("#emaila").val(),
					tel: $("#tela").val(),
					dir: $("#dirsa").val(),
					suc: $("#sautotrans").val(),
					es: $("#esta").val()
                    },
                    beforeSend: function()
                    {
                        $("#load_ajax_autotrans").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_autotrans").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();
                        $("#cargar_autotransporte").load("listarAutotransporte.php");
                    },
                });
            });
            $('#modAutotransporte').on('show.bs.modal',function(event)
            {
				var button = $(event.relatedTarget)
                var id = button.data('midautotrans')
				var caut = button.data('mclauto')
                var aut = button.data('mautotrans')
                var cont = button.data('mcontactol')
                var ema = button.data('memaila')
				var tel = button.data('mtela')				
				var dir = button.data('mdirsa')
				var suc = button.data('sucautotrans')
				var est = button.data('mesta')
                var modal = $(this)
			    modal.find('#idla').val(id)
				modal.find('#mclauto').val(caut)
                modal.find('#mautotrans').val(aut)
                modal.find('#mcontactol').val(cont)
				modal.find('#memaila').val(ema)
				modal.find('#mtela').val(tel)
				modal.find('#mdirsa').val(dir)
                modal.find('#smautotrans').val(suc)
				modal.find('#mesta').val(est)
            });
			 /*ACTUALIZAR AUTOTRANSPORTES*/
            $("#btnModAutotrans").click(function()
            {
			 $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:40,
					id: $("#idla").val(),
					ca: $("#mclauto").val(),
					au: $("#mautotrans").val(),
					cont: $("#mcontactol").val(),
					em: $("#memaila").val(),
					tel: $("#mtela").val(),
					dir: $("#mdirsa").val(),
					suc: $("#smautotrans").val(),
					es: $("#mesta").val()
                    },
                    beforeSend: function()
                    {
                        $("#load_ajax_mautotrans").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mautotrans").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();
                        $("#cargar_autotransporte").load("listarAutotransporte.php");
                    },
                });
            });
			/*ELIMINAR AUTOTRANSPORTE*/
            $("#btnDelAutotrans").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:42,id: $("#idla").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_mautotrans").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mautotrans").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();						
						$('#modPersonal').modal('hide');
						$("#htmlext2").load('#modPersonal');
                        $("#cargar_autotransporte").load("listarAutotransporte.php");
                    },
                });
            });
            /*ACTUALIZAR PERSONAL*/
            $("#btnUpdPersonal").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:2,
					dat_midp: $("#txtm_idp").val(),
					dat_mrfc: $("#txtm_rfc").val(),
					dat_mnom: $("#txtm_nombre").val(),
					dat_medad: $("#selm_edad").val(),
					dat_mema: $("#txtm_email").val(),
					dat_mtel: $("#txtm_telefono").val(),
					dat_msex: $("#selm_sexo").val(),
					dat_mdir: $("#txtm_dir").val(),
					dat_mpue: $("#selm_puesto").val(),
					dat_mciu: $("#txtm_ciu").val(),
					dat_mest: $("#txtm_est").val(),
					dat_msuc: $("#selm_suc").val(),
					dat_mcre: $("#txtm_cre").val()
                    },
                    beforeSend: function()
                    {
                        $("#load_ajax_mPersonal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mPersonal").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();
                        $("#cargar_personal").load("listarPersonal.php");
                    },
                });
            });
            /*ELIMINAR PERSONAL*/
            $("#btnDelPersonal").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:3,del_personal: $("#txtm_idp").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_mPersonal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mPersonal").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();						
						$('#modPersonal').modal('hide');
						$("#htmlext2").load('#modPersonal');
                        $("#cargar_personal").load("listarPersonal.php");
                    },
                });
            });
            /*NUEVO PUESTO*/
            $("#btnAddPuesto").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:4,dat_aPuesto: $("#txtA_puesto").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_puesto").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btn_salirA_puesto").hide();
                        $("#btnAddPuesto").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_puesto").html(datos);
                        $("#btn_salirA_puesto").show();
                        $("#btnAddPuesto").show();
						$('#addPersonal').modal('hide');
						$("#htmlext2").unload('#addPersonal');
						$("#cargar_puesto").load("listarPuesto.php");
						$("#ps").load("listarPuesto.php");
                    },
                });
            });
            $('#modPuesto').on('show.bs.modal',function(event)
            {
                var button = $(event.relatedTarget)
                var idc = button.data('idc')
                var pue = button.data('pue')
                var modal = $(this)
                modal.find('#txtU_idc').val(idc)
                modal.find('#txtU_pue').val(pue)				
            });
            /*ACTUALIZAR PUESTO*/
            $("#btnUpdPuesto").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:5,dat_mdi: $("#txtU_idc").val(),dat_mpu: $("#txtU_pue").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_mpuesto").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPuesto").hide();
                        $("#btnDelPuesto").hide();
                        $("#btnExiPuesto").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mpuesto").html(datos);
                        $("#btnUpdPuesto").show();
                        $("#btnDelPuesto").show();
                        $("#btnExiPuesto").show();
                        $("#cargar_puesto").load("listarPuesto.php");
                    },
                });
            });
            /*ELIMINAR PÜESTO*/
            $("#btnDelPuesto").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:6,del_puesto: $("#txtU_idc").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_mpuesto").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPuesto").hide();
                        $("#btnDelPuesto").hide();
                        $("#btnExiPuesto").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mpuesto").html(datos);
                        $("#btnUpdPuesto").show();
                        $("#btnDelPuesto").show();
                        $("#btnExiPuesto").show();
						$('#modPuesto').modal('hide');
						$("#htmlext2").load('#modPuesto');
                        $("#cargar_puesto").load("listarPuesto.php");
                    },
                });
            });
			//AGREGAR NUEVA SUCURSAL
			$("#btnAddSucursal").click(function()
            {
               $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
					data: {
						dat_op:7,
						dat_csuc: $("#csuc").val(),
						dat_nsucursal: $("#nsucursal").val(),
						dat_nsucursal2: $("#nsucursal2").val(),
						dat_datos1: $("#datos1").val(),
						dat_datos2: $("#datos2").val(),
						dat_emails: $("#emails").val(),
						dat_tels: $("#tels").val(),
						dat_dirs: $("#dirs").val(),
						dat_ciudads: $("#ciudads").val(),
						dat_ests: $("#ests").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_sucursal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btn_salir_aSucursal").hide();
                        //$("#btnAddPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_sucursal").html(datos);
                        $("#btn_salir_aSucursal").show();
                        //$("#btnAddPersonal").hide();
                        $("#cargar_sucursal").load("listarSucursal.php");
                    },
                });
            });
			//ACTUALIZAR SUCURSAL
			$('#modSucursal').on('show.bs.modal',function(event)
            {
               	var button = $(event.relatedTarget)
				var mids=button.data('mids')
                var mcs = button.data('mcs')
                var mns = button.data('mns')
				var mns2 = button.data('mns2')
				var md1 = button.data('md1')
				var md2 = button.data('md2')
                var mems = button.data('mems')
                var mts = button.data('mts')
                var mds = button.data('mds')
				var mcius = button.data('mcius')
                var mests = button.data('mests')
              
                var modal = $(this)
                modal.find('#mids').val(mids)
                modal.find('#mcs').val(mcs)
                modal.find('#mns').val(mns)
				modal.find('#mns2').val(mns2)
				modal.find('#md1').val(md1)
				modal.find('#md2').val(md2)
                modal.find('#mems').val(mems)
                modal.find('#mts').val(mts)
				modal.find('#mds').val(mds)
                modal.find('#mcius').val(mcius)
				modal.find('#mests').val(mests)
               
            });
			//ACTUALIZAR SUCURSAL
			$("#btnUpdSucursal").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
					 data: {
						dat_op:8,
						dat_mids: $("#mids").val(),
						dat_mcs: $("#mcs").val(),
						dat_mns: $("#mns").val(),
						dat_mns2: $("#mns2").val(),
						dat_md1: $("#md1").val(),
						dat_md2: $("#md2").val(),
						dat_mems: $("#mems").val(),
						dat_mts: $("#mts").val(),
						dat_mds: $("#mds").val(),
						dat_mcius: $("#mcius").val(),
						dat_mests: $("#mests").val()						
                    },
                    beforeSend: function()
                    {
                        $("#load_ajax_mSucursal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdSucursal").hide();
                        $("#btnDelSucursal").hide();
                        $("#btnExiSucursal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mSucursal").html(datos);
                        $("#btnUpdSucursal").show();
                        $("#btnDelSucursal").show();
                        $("#btnExiSucursal").show();
                        $("#cargar_sucursal").load("listarSucursal.php");
                    },
                });
            });
			/*ELIMINAR SUCURSAL*/
            $("#btnDelSucursal").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:9,del_sucursal: $("#mids").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_mSucursal").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdSucursal").hide();
                        $("#btnDelSucursal").hide();
                        $("#btnExiSucursal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mSucursal").html(datos);
                        $("#btnUpdSucursal").show();
                        $("#btnDelSucursal").show();
                        $("#btnExiSucursal").show();						
						//$('#modSucursal').modal('hide');
						$("#htmlext2").load('#modSucursal');
                        $("#cargar_sucursal").load("listarSucursal.php");
                    },
                });
            });
            //ACTUALIZAR LA PÁGINA AL DAR CLIC EN EL BOTON SALIR DE CADA VENTANA MODAL
            /*$("#btn_salir_aPersonal").click(function()
            {
                setTimeout('document.location.reload()',0000);
            });
            $("#btnExiPersonal").click(function()
            {
                setTimeout('document.location.reload()',0000);
            });
            $("#btn_salirA_puesto").click(function()
            {
                $('.nav-tabs a[href="#tab_pue"]').tab('show');
                setTimeout('document.location.reload()',0000);
            });
            $("#btnExiPuesto").click(function()
            {
                $('.nav-tabs a[href="#tab_pue"]').tab('show');
                setTimeout('document.location.reload()',0000);
            });*/
        });
    </script>
</body>
</html>