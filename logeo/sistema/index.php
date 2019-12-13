<?php
    require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
    require '../includes/generaCeros.php';
    require '../includes/fechas.php';

    $resInst=$conn->query("SELECT *FROM tbls_institucion");
    $we=$resInst->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SIFAT - Sistema</title>
    <?php
        include '../includes/head.php';
    ?>
    <style type="text/css">
        #btn_img{border: 0px;background-color: transparent;}
    </style>
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
                            <b>INFORMACIÓN DEL SISTEMA</b>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_sistema" data-toggle="tab" tabindex="1"><b><i style="width: 16px" class="fa fa-desktop"></i> Sistema</b></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab_sistema"><br>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="row" id="btn_logo">
                                                    <button id="btn_img" name="btn_img">
                                                        <?php
                                                            if($we['logo']=="")
                                                            {
                                                                ?>
                                                                <img src="../images/create_thumb(1).png" width="80px"><br><b style="color: red">Cambiar Logo</b>
                                                                <?php
                                                            }
                                                            else if ($we['url']=="")
                                                            {
                                                                ?>
                                                                <a href="">
                                                                    <img src="../images/<?php echo $we['logo']; ?>" width="80px">
                                                                </a>
                                                                <?php
                                                            }
                                                            else if ($we['url']!="")
                                                            {
                                                                ?>
                                                                <a href="<?php echo $we['url']; ?>" target="_blank">
                                                                    <img src="../images/<?php echo $we['logo']; ?>" width="80px">
                                                                </a>
                                                                <?php
                                                            }
                                                        ?>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <form method="post" id="formulario" enctype="multipart/form-data">
                                                        <input type="file" name="file" id="file" class="form-control"><br>
                                                    </form>
                                                    <div id="respuesta"></div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_dep" id="id_dep" value="<?php echo $we['id_instituto']; ?>">
                                                        <input type="text" name="dependencia" id="dependencia" class="form-control" placeholder="Dependencia" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['dependencia']; ?>">
                                                        <label id="mensaje1" style="display:none;color:red">Campo Vacio / Dependencia</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="departamento" id="departamento" class="form-control" placeholder="Departamento" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['departamento']; ?>">
                                                        <label id="mensaje1-" style="display:none;color:red">Campo Vacio / Departamento</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="domicilio" id="domicilio" class="form-control" style="resize: none" placeholder="Domicilio" onblur="javascript:this.value=this.value.toUpperCase();"><?php echo $we['domicilio']; ?></textarea>
                                                <label id="mensaje2" style="display:none;color:red">Campo Vacio / Domicilio</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="url" name="url_tec" id="url_tec" class="form-control" placeholder="URL Tecnológico" value="<?php echo $we['url']; ?>">
                                                <label id="mensaje2" style="display:none;color:red">Campo Vacio / Domicilio</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" name="clave" id="clave" maxlength="3" class="form-control" placeholder="Clave" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['clave']; ?>">
                                                        <label id="mensaje3" style="display:none;color:red">Campo Vacio / Solo Enteros / 3 Digitos</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['ciudad']; ?>">
                                                        <label id="mensaje4" style="display:none;color:red">Campo Vacio / Ciudad</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" name="rfc_d" id="rfc_d" maxlength="13" class="form-control" placeholder="RFC Director" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['rfc_d']; ?>">
                                                        <label id="mensaje5" style="display:none;color:red">Campo Vacio / RFC Director</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="director" id="director" class="form-control" placeholder="Director" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['director']; ?>">
                                                        <label id="mensaje6" style="display:none;color:red">Campo Vacio / Director Institucion</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" name="rfc_c" id="rfc_c" maxlength="13" class="form-control" placeholder="RFC Contralor" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['rfc_c']; ?>">
                                                        <label id="mensaje7" style="display:none;color:red">Campo Vacio / RFC Contralor</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="contralor" id="contralor" class="form-control" placeholder="Contralor" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['contralor']; ?>">
                                                        <label id="mensaje8" style="display:none;color:red">Campo Vacio / Contralor</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" name="rfc_ca" id="rfc_ca" maxlength="13" class="form-control" placeholder="RFC Cajero" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['rfc_ca']; ?>">
                                                        <label id="mensaje9" style="display:none;color:red">Campo Vacio / RFC Cajero</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="cajero" id="cajero" class="form-control" placeholder="Cajero" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['cajero']; ?>">
                                                        <label id="mensaje10" style="display:none;color:red">Campo Vacio / Cajero</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" name="rfc_dg" id="rfc_dg" maxlength="13" class="form-control" placeholder="RFC Director General" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['rfc_dg']; ?>">
                                                        <label id="mensaje11" style="display:none;color:red">Campo Vacio / RFC Dir. General</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="directorg" id="directorg" class="form-control" placeholder="Director General" onblur="javascript:this.value=this.value.toUpperCase();" value="<?php echo $we['directorg']; ?>">
                                                        <label id="mensaje12" style="display:none;color:red">Campo Vacio / Director General</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    if (($resInst->num_rows)>0)
                                                    {
                                                        ?>
                                                        <div class="form-group">
                                                            <div class="col-md-8"></div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <button type="button" data-toggle='modal' data-target="#btn_updI" class="btn btn-warning btn-block"><i style="width: 16px" class="fa fa-refresh"></i> Actualizar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="form-group">
                                                            <div class="col-md-8"></div>
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <button type="button" data-toggle='modal' data-target="#btn_addI" class="btn btn-primary btn-block"><i style="width: 16px" class="fa fa-save"></i> AGREGAR</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                ?>
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
	</div>
    <!--MODIFICAR SISTEMA-->
    <div class="col-md-12">
        <div class="modal fade" id="btn_updI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body" align="center">
                        <h4>¿DESEA GUARDAR LOS CAMBIOS?</h4>
                        <br>
                        <div id="datos_ajax_act"></div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn_updDatI" class="btn btn-primary"><i style="width: 16px" class="fa fa-refresh"></i> MODIFICAR</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnEx_upd"><i style="width: 16px" class="fa fa-times"></i> SALIR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MODIFICAR SISTEMA-->
    <div class="col-md-12">
        <div class="modal fade" id="btn_addI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body" align="center">
                        <h4>¿DESEA GUARDAR LA INFORMACIÓN?</h4>
                        <br>
                        <div id="datos_ajax_add"></div>
                    </div>
                    <div class="modal-footer">
                        <button id="btn_addDatI" class="btn btn-primary"><i style="width: 16px" class="fa fa-save"></i> GUARDAR</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnEx_add"><i style="width: 16px" class="fa fa-times"></i> SALIR</button>
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
            //AGREGAR INSTITUCION
            $("#btn_addDatI").click(function(event)
            {
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {data_idd: $("#id_dep").val(),data_ins: $("#dependencia").val(),data_dep: $("#departamento").val(),data_dom: $("#domicilio").val(),data_url: $("#url_tec").val(),data_cla: $("#clave").val(),data_ciu: $("#ciudad").val(),data_rf1: $("#rfc_d").val(),data_dir: $("#director").val(),data_rf2: $("#rfc_c").val(),data_con: $("#contralor").val(),data_rf3: $("#rfc_ca").val(),data_caj: $("#cajero").val(),data_rf4: $("#rfc_dg").val(),data_dig: $("#directorg").val()},
                    beforeSend: function(objeto)
                    {
                        $("#datos_ajax_add").html("<img src='../images/gif-load (1).gif'><br>Guardando datos...");
                        $("#btnEx_add").hide();
                        $("#btn_addDatI").hide();
                    },
                    success: function(datos)
                    {
                        $("#datos_ajax_add").html(datos);
                        $("#btnEx_add").show();
                        $("#btn_addDatI").show();
                    }
                });
            });
            //ACTUALIZAR INSTITUCION
            $("#btn_updDatI").click(function(event)
            {
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: {dat_idd: $("#id_dep").val(),dat_ins: $("#dependencia").val(),dat_dep: $("#departamento").val(),dat_dom: $("#domicilio").val(),dat_url: $("#url_tec").val(),dat_cla: $("#clave").val(),dat_ciu: $("#ciudad").val(),dat_rf1: $("#rfc_d").val(),dat_dir: $("#director").val(),dat_rf2: $("#rfc_c").val(),dat_con: $("#contralor").val(),dat_rf3: $("#rfc_ca").val(),dat_caj: $("#cajero").val(),dat_rf4: $("#rfc_dg").val(),dat_dig: $("#directorg").val()},
                    beforeSend: function(objeto)
                    {
                        $("#datos_ajax_act").html("<img src='../images/gif-load (1).gif'><br>Actualizando datos...");
                        $("#btnEx_upd").hide();
                        $("#btn_updDatI").hide();
                    },
                    success: function(datos)
                    {
                        $("#datos_ajax_act").html(datos);
                        $("#btnEx_upd").show();
                        $("#btn_updDatI").show();
                    }
                });
            });
            $("input[name='file']").on("change", function()
            {
                var formData = new FormData($("#formulario")[0]);
                $.ajax({
                    url: 'ajax.php',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)
                    {
                        $("#respuesta").html(datos);
                        //$("#btn_logo").setTimeout(0000);
                        setTimeout('document.location.reload()',5000);
                    }
                });
            });
        });
    </script>
</body>
</html>