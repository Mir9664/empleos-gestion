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
	<title>ME - Datos</title>
    <?php
        include '../includes/head.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            
			$("#cargar_importe").load("listarImporte.php");
			$("#cargar_Clientes").load("listarClientes.php");
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
		<div id="page-wrapper"><br><br><br><br><br><br>
			<div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissable" id="msg" style="display: none">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <br>
                    </div>
                	<div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <b>[Banco de Datos - Operaciones]</b><div id="mensaje"></div>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_per" id="tabp" data-toggle="tab" tabindex="1"><b>
									<i style="width: 16px" class="fa fa-users"></i> 
									Importe</b></a>
                                </li>
                                <!--<li>
                                    <a href="#tab_pue" data-toggle="tab" tabindex="2"><b><i style="width: 16px" class="fa fa-sitemap"></i> Puesto</b></a>
                                </li>-->
								 <li>								
                                    <a href="#tab_suc" data-toggle="tab" tabindex="3"><b>
									<i style="width: 16px" class="fa fa-institution"></i> 
									Cliente</b></a>
                                </li>
                            </ul>
                            <div class="tab-content">
								<!--PERSONAL-->
                                <div class="tab-pane fade in active" id="tab_per"><br>
                                    <div class="col-md-4">
                                        <select name="critBPer" id="critBPer" class="form-control" autofocus="">
                                            <option value="">Seleccione una opción</option>
                                            <option value="all1">Ver Todos</option>
                                            <option value="bin1">Informacion del Importe</option>
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
										Nuevos Importes</button><br><br>
                                    </div>
                                    <br><br>
                                    <div id="cargar_importe" align="center">
									<!--AQUI ES DONDE SE LISTA EL PERSONAL-->
									</div>
                                </div>
								<!--PUESTOS-->
                                <div class="tab-pane fade" id="tab_pue"><br>
                                    <div class="col-md-4">
                                        <select name="critBPue" id="critBPue" class="form-control">
                                            <option value="sel2">Seleccione una opción</option>
                                            <option value="all2">Ver Todos</option>
                                            <option value="bin2">Puesto</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="txt_puesto" id="txt_puesto" class="form-control" placeholder="Texto" onKeyUp="buscarPuesto();" autofocus="true" style="display: none;">
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <label id="msgBPue" style="color: red;display: none;"><b>Elija una opcion</b></label>
                                    </div>
                                    <div class="col-md-3" align="right">
                                        <button class="btn btn-primary btn-block btn-xs" data-toggle='modal' data-target='#addPuesto' ><i style="width: 16px" class="fa fa-suitcase"></i> Nuevo Puesto</button>
                                    </div>
                                    <br><br>
                                    <div class="table-responsive">
                                        <div class="cargar_puesto" id="cargar_puesto"></div>
                                    </div>
                                </div>
								<!--SUCURSALES-->
								<div class="tab-pane fade" id="tab_suc"><br>
									 <div class="col-md-4">
                                        <select name="critBSuc" id="critBSuc" class="form-control">
                                            <option value="sel2">Seleccione una opción</option>
                                            <option value="all2">Ver Todas</option>
                                            <option value="bin2">Sucursal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="txt_sucursal" id="txt_sucursal" class="form-control" placeholder="Texto" onKeyUp="buscarSucursal();" autofocus="true" style="display: none;">
                                    </div>
                                    <div class="col-md-2" align="center">
                                        <label id="msgBSuc" style="color: red;display: none;"><b>Elija una opcion</b></label>
                                    </div>
                                    <div class="col-md-3" align="right">
                                        <button class="btn btn-primary btn-block btn-xs" data-toggle='modal' data-target='#addRemitente' ><i style="width: 16px" class="fa fa-suitcase"></i> Nuevo Cliente</button>
                                    </div>
                                    <br><br>
                                    <div class="table-responsive">
                                        <div class="cargar_Clientes" id="cargar_Clientes"></div>
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
        include 'nuevoImporte.php';       
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
	<!--AGREGAR CLIENTE-->
    <div class="col-md-12">
        <div class="modal fade" id="addRemitente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                        <div id="load_ajax_aRemitente" align="center"></div>
                    </div>
                    <div class="modal-body">
						<div class="row">
							<div class="col-md-6">						
								<div class="form-group">
								<h6>Rfc. R.:</h6>
								<input type="text" id="rfcr" class="form-control" 
								placeholder="XXXX123456Y78" 
								onblur="this.value=this.value.toUpperCase()"
								>						
								</div>	
								<div class="form-group">
								<h6>Cliente R.:</h6>
								<input type="text" id="remitente"
								class="form-control"
								placeholder="NOMBRE PATERNO MATERNO" 
								onblur="this.value=this.value.toUpperCase()"
								style="background-color:#D4F98F;"
								>						
								</div>
								<div class="form-group">
								<h6>Domicilio R.:</h6>
								<input type="text" id="domicilior" class="form-control" 
								placeholder="CALLE, NUMERO EXT/INT, NO. PISO" 
								onblur="this.value=this.value.toUpperCase()"
								style="background-color:#D4F98F;"
								>						
								</div>
								<div class="form-group">
								<h6>Colonia R.:</h6>
								<input type="text" 
								id="coloniar" 
								class="form-control" 
								placeholder="COLONIA" 
								onblur="this.value=this.value.toUpperCase()"
								style="background-color:#D4F98F;"
								>						
								</div>
								<div class="form-group">
								<h6>Referencia R.:</h6>
								<input type="text" id="poblacionr" class="form-control" placeholder="POBLACIÓN" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Ciudad R.:</h6>
								<input type="text" 
								id="ciudadr" 
								class="form-control"
								placeholder="CIUDAD"
								style="background-color:#D4F98F;"
								onblur="this.value=this.value.toUpperCase()">						
								</div>
							</div>
							<div class="col-md-6">					
								<div class="form-group">
								<h6>Estado R.:</h6>
								<input type="text" id="estador" class="form-control" placeholder="ESTADO" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>C. P. R.:</h6>
								<input type="number" id="cpr" class="form-control" placeholder="12345" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Teléfono 1 R. :</h6>
									<input type="tel" 
									style="background-color:#D4F98F;"
									id="tel1r" class="form-control" 
									placeholder="123-456789" 
									onblur="this.value=this.value.toUpperCase()">
									<label id="teltdcr" style="display:none;color:red">
									 Campo Vacio / Ingrese el los datos correctamente
									</label>
								</div>
								<div class="form-group">
								<h6>Teléfono 2 R. :</h6>
								<input type="tel" id="tel2r" class="form-control" placeholder="123-456789" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Correo R. :</h6>
								<input type="email" id="emailr" class="form-control" placeholder="cuenta@dominio.xyz" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Observaciones R. :</h6>
								<input type="text" id="observr" class="form-control" placeholder="Observaciones" onblur="this.value=this.value.toUpperCase()">						
								</div>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnUpdRemitente" class="btn btn-primary"><i class="fa fa-refresh"></i> Guardar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiMarca"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--AGREGAR REMITENTE2-->
	<!--MODIFICAR CLIENTE-->
    <div class="col-md-12">
        <div class="modal fade" id="modCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
                        <div id="load_ajax_mRemitente" align="center"></div>
                    </div>
                    <div class="modal-body">
						<div class="row">
							<div class="col-md-6">						
								<div class="form-group">
								<input type="text" id="midrd">
								<h6>Rfc.:</h6>
								<input type="text" id="rfcr2" class="form-control" 
								placeholder="XXXX123456Y78" 
								onblur="this.value=this.value.toUpperCase()"
								>						
								</div>	
								<div class="form-group">
								<h6>Cliente:</h6>
								<input type="text" id="remitente2"
								class="form-control"
								placeholder="NOMBRE PATERNO MATERNO" 
								onblur="this.value=this.value.toUpperCase()"
								style="background-color:#D4F98F;"
								>						
								</div>
								<div class="form-group">
								<h6>Domicilio:</h6>
								<input type="text" id="domicilior2" class="form-control" 
								placeholder="CALLE, NUMERO EXT/INT, NO. PISO" 
								onblur="this.value=this.value.toUpperCase()"
								style="background-color:#D4F98F;"
								>						
								</div>
								<div class="form-group">
								<h6>Colonia:</h6>
								<input type="text" 
								id="coloniar2" 
								class="form-control" 
								placeholder="COLONIA" 
								onblur="this.value=this.value.toUpperCase()"
								style="background-color:#D4F98F;"
								>						
								</div>
								<div class="form-group">
								<h6>Referencia:</h6>
								<input type="text" id="poblacionr2" class="form-control" placeholder="POBLACIÓN" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Ciudad:</h6>
								<input type="text" 
								id="ciudadr2" 
								class="form-control"
								placeholder="CIUDAD"
								style="background-color:#D4F98F;"
								onblur="this.value=this.value.toUpperCase()">						
								</div>
							</div>
							<div class="col-md-6">					
								<div class="form-group">
								<h6>Estado:</h6>
								<input type="text" id="estador2" class="form-control" placeholder="ESTADO" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>C. P.:</h6>
								<input type="number" id="cpr2" class="form-control" placeholder="12345" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Teléfono 1 :</h6>
									<input type="tel" 
									style="background-color:#D4F98F;"
									id="tel1r2" class="form-control" 
									placeholder="123-456789" 
									onblur="this.value=this.value.toUpperCase()">	
									<label id="tel1r22" style="display:none;color:red">
									 Campo Vacio / Ingrese el los datos correctamente
									</label>
								</div>
								<div class="form-group">
								<h6>Teléfono 2:</h6>
								<input type="tel" id="tel2r2" class="form-control" placeholder="123-456789" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Correo:</h6>
								<input type="email" id="emailr2" class="form-control" placeholder="cuenta@dominio.xyz" onblur="this.value=this.value.toUpperCase()">						
								</div>
								<div class="form-group">
								<h6>Observaciones:</h6>
								<input type="text" id="observr2" class="form-control" placeholder="Observaciones" onblur="this.value=this.value.toUpperCase()">						
								</div>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button id="ModRemitente2" class="btn btn-primary"><i class="fa fa-refresh"></i> Guardar</button>
						<button id="DelRemitente" class="btn btn-danger"><i class="fa fa-refresh"></i> Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiMarca"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--AGREGAR REMITENTE2-->
	<!--NUEVA SUCURSAL -->
    <?php
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
			//PARA ACTUALIZAR SELECT DE NUEVO SUCURSAL IMPORTES
			$('#ap1').click(function(){
				$('.modal-body22').load('importes.php',function(){
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
			//MODIFICAR IMPORTE
            $('#modImporte').on('show.bs.modal',function(event)
            {                
				var button = $(event.relatedTarget)
				var midimp = button.data('midimp')
                var midsuc = button.data('midsuc')
                var mdest = button.data('mdest')
                var meloc = button.data('meloc')
                var mseloc = button.data('mseloc')
                var mochi = button.data('mochi')
				var mechi = button.data('mechi')
                var msechi = button.data('msechi')
                var mome = button.data('mome')
				var meme = button.data('meme')
				var mseme = button.data('mseme')
				var mogra = button.data('mogra')
                var megra = button.data('megra')
				var msegra = button.data('msegra')
                var modal = $(this)
				modal.find('#idimp').val(midimp)
                modal.find('#midsuc').val(midsuc)
                modal.find('#mdest').val(mdest)
                modal.find('#meloc').val(meloc)
                modal.find('#mseloc').val(mseloc)
                modal.find('#mochi').val(mochi)
				modal.find('#mechi').val(mechi)
                modal.find('#msechi').val(msechi)
                modal.find('#mome').val(mome)
				modal.find('#meme').val(meme)
				modal.find('#mseme').val(mseme)
				modal.find('#mogra').val(mogra)
                modal.find('#megra').val(megra)	
				modal.find('#msegra').val(msegra)	
            });
            /*AGREGA IMPORTE*/
            $("#btnUpdImporte").click(function()
            {
               	$.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:38,
					midsuc:$("#idsuc").val(),
					mdest:$("#dest").val(),
					meloc:$("#eloc").val(),
					mseloc:$("#seloc").val(),
					mochi:$("#ochi").val(),
					mechi:$("#echi").val(),
					msechi:$("#sechi").val(),
					mome:$("#ome").val(),
					meme:$("#eme").val(),
					mseme:$("#seme").val(),
					mogra:$("#ogra").val(),
					megra:$("#egra").val(),
					msegra:$("#segra").val()
                    },
                    beforeSend: function()
                    {
                        $("#load_ajax_Importe").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_Importe").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();
                        $("#cargar_importe").load("listarImporte.php");
                    },
                });
            });
            /*ACTUALIZAR IMPORTE*/
            $("#btnMdImporte").click(function()
            {
               	$.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:37,
					midimp:$("#idimp").val(),
					midsuc:$("#midsuc").val(),
					mdest:$("#mdest").val(),
					meloc:$("#meloc").val(),
					mseloc:$("#mseloc").val(),
					mochi:$("#mochi").val(),
					mechi:$("#mechi").val(),
					msechi:$("#msechi").val(),
					mome:$("#mome").val(),
					meme:$("#meme").val(),
					mseme:$("#mseme").val(),
					mogra:$("#mogra").val(),
					megra:$("#megra").val(),
					msegra:$("#msegra").val()
                    },
                    beforeSend: function()
                    {
                        $("#load_ajax_mImporte").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mImporte").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();
                        $("#cargar_importe").load("listarImporte.php");
                    },
                });
            });
		    /*ELIMINAR IMPORTE*/
            $("#btnDelImporte").click(function()
            {
                $.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:39,idi: $("#idimp").val()},
                    beforeSend: function()
                    {
                        $("#load_ajax_mImporte").html("<img src='../images/gif-load (1).gif'><br>...Enviando Datos...");
                        $("#btnUpdPersonal").hide();
                        $("#btnDelPersonal").hide();
                        $("#btnExiPersonal").hide();
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mImporte").html(datos);
                        $("#btnUpdPersonal").show();
                        $("#btnDelPersonal").show();
                        $("#btnExiPersonal").show();						
						$('#modPersonal').modal('hide');
						$("#htmlext2").load('#modPersonal');
                        $("#cargar_importe").load("listarImporte.php");
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
			/*NUEVO CLIENTE*/
            $("#btnUpdRemitente").click(function()
            {
               	var er1_EntradaS = /^([0-9]{10})$/
				if(!er1_EntradaS.test($('#tel1r').val()) || $('#tel1r').val()=='') {
					alert("Telefono incorrecto");
					$('#teltdcr').show()
					return false;
                }
				$.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:19,
					rfcr: $("#rfcr").val(),
					remitente: $("#remitente").val(),
					domicilior: $("#domicilior").val(),
					coloniar: $("#coloniar").val(),
					poblacionr: $("#poblacionr").val(),
					ciudadr: $("#ciudadr").val(),
					estador: $("#estador").val(),
					cpr: $("#cpr").val(),
					tel1r: $("#tel1r").val(),
					tel2r: $("#tel2r").val(),
					obs: $("#observr").val(),
					emailr: $("#emailr").val()},
                    beforeSend: function()
                    {
                       
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_aRemitente").html(datos);
						$("#cargar_Clientes").load("listarClientes.php");						
						//$("#addRemitente").dismissable();
						setTimeout(function(){ $('#addRemitente').modal('hide');},1000);
                    },
                });
            });
			//MODIFICAR CLIENTE
            $('#modCliente').on('show.bs.modal',function(event)
            {                
				var button = $(event.relatedTarget)
				var midrd = button.data('mid')
                var remitente2 = button.data('mnomrd')				
				var domicilior2 = button.data('mdord')
                var coloniar2 = button.data('mcolrd')
                var poblacionr2 = button.data('mpord')
                var ciudadr2 = button.data('mciurd')
                var tel1r2 = button.data('mtelrd1')
				var tel2r2 = button.data('mtelrd2')
                var cpr2 = button.data('mcprd')
                var rfcr2 = button.data('mrfcrd')
				var emailr2 = button.data('mcorrd')
				var estador2 = button.data('mestrd')
				var observ = button.data('observrd')
				var modal = $(this)
                modal.find('#midrd').val(midrd)
                modal.find('#remitente2').val(remitente2)				
				modal.find('#domicilior2').val(domicilior2)
                modal.find('#coloniar2').val(coloniar2)
                modal.find('#poblacionr2').val(poblacionr2)
                modal.find('#ciudadr2').val(ciudadr2)
                modal.find('#tel1r2').val(tel1r2)
				modal.find('#tel2r2').val(tel2r2)
                modal.find('#cpr2').val(cpr2)
                modal.find('#rfcr2').val(rfcr2)
				modal.find('#emailr2').val(emailr2)
				modal.find('#estador2').val(estador2)
				modal.find('#observr2').val(observ)
            });
			/*MODIFICAR CLIENTE*/
            $("#ModRemitente2").click(function()
            {
               	var er1_EntradaS = /^([0-9]{10})$/
				if(!er1_EntradaS.test($('#tel1r2').val()) || $('#tel1r2').val()=='') {
					alert("Telefono incorrecto");
					$('#tel1r22').show()
					return false;
                }
				$.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:47,
					midrd: $("#midrd").val(),
					rfcr: $("#rfcr2").val(),
					remitente: $("#remitente2").val(),
					domicilior: $("#domicilior2").val(),
					coloniar: $("#coloniar2").val(),
					poblacionr: $("#poblacionr2").val(),
					ciudadr: $("#ciudadr2").val(),
					estador: $("#estador2").val(),
					cpr: $("#cpr2").val(),
					tel1r: $("#tel1r2").val(),
					tel2r: $("#tel2r2").val(),
					obs: $("#observr2").val(),
					emailr: $("#emailr2").val()},
                    beforeSend: function()
                    {
                       
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mRemitente").html(datos);
						$("#btnExiSucursal").show();	
						$("#cargar_Clientes").load("listarClientes.php");						
                    },
                });
            });
			/*ELIMINAR CLIENTE*/
            $("#DelRemitente").click(function()
            {
               	$.ajax({
                    url: '../funciones/ajax_add.php',
                    type: 'POST',
                    data: {dat_op:48,
					midrd: $("#midrd").val()},
                    beforeSend: function()
                    {
                       
                    },
                    success: function(datos) 
                    {
                        $("#load_ajax_mRemitente").html(datos);
						$("#btnExiSucursal").show();	
						$("#cargar_Clientes").load("listarClientes.php");						
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