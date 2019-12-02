<link rel="stylesheet" href="main.css">
<div class="col-md-12">
        <div class="modal fade" id="addSucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-institution"></i> Nuevo Empleo</h5>
                        <div id="load_ajax_sucursal" align="center"></div>
                    </div>
                    <div class="modal-body">
						<h6>Empleo:</h6>
						<div class="form-group">
                            <input type="text" name="csuc" id="csuc" class="form-control" placeholder="Empleo" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Empresa:</h6>
                        <div class="form-group">
                            <input type="text" name="nsucursal" id="nsucursal" class="form-control" placeholder="Empresa" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Datos de Empresa:</h6>
                        <div class="form-group">
                            <input type="textarea" name="datos1" id="datos1" class="form-control" placeholder="Datos" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						
						<h6>Email:</h6>
						 <div class="form-group">
                            <input type="text" name="emails" id="emails" class="form-control" placeholder="Email" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Telefono:</h6>
						 <div class="form-group">
                            <input type="text" name="tels" id="tels" class="form-control" placeholder="Telefono" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Direccion:</h6>
						 <div class="form-group">
                            <input type="text" name="dirs" id="dirs" class="form-control" placeholder="Direccion" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Ciiudad:</h6>
						 <div class="form-group">
                            <input type="text" name="ciudads" id="ciudads" class="form-control" placeholder="Ciudad" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Estado:</h6>
						<div class="form-group">
                            <input type="text" name="ests" id="ests" class="form-control" placeholder="Estado" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnAddSucursal" class="btn btn-primary"><i class="fa fa-save"></i>Guardar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_salirA_sucursal"><i class="fa fa-sign-out"></i>Salir</button>
                    </div>
                </div>
            </div>
        </div>
</div>
	<!--MODIFICAR-ELIMINAR EMPRESA-->
    <div class="col-md-12">
        <div class="modal fade" id="modSucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cargar Curriculum Vitae</h5>
                        <div id="load_ajax_mSucursal" align="center"></div>
                            <form action="subir.php" id="formulario" enctype="multipart/form-data" method="post" name="formulario">
                                <div>
                                <label>Nombre</label>
                                <input id="nombre" name="nombre" required type="text">
                                </div>
                                <div>
                                <label>E-mail remite:</label>
                                <input  id="email" name="email" required type="email">
                                </div>
                                <div>
                                <label>E-mail destino:</label>
                                <input  id="ema" name="ema" required type="email">
                                </div>
                                <div>
    <label for="File">Desde aqui podra subir su CV...</label>
    <input id="my_file" name="my_file" type="file">
  </div>
  <button class="btn btn-danger" type="submit">Enviar</button>
                                <!--<div class="form-1-2">
                                    <label for="">Archivo a Subir</label>
                                    <input type="file" id="archivo" name="archivo" required>
                                </div>
                                <div class="barra">
                                    <div class="barra_azul" id="barra_estado">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="acciones">
                                    <input type="submit" class="btn" value="Enviar">
                                    <input class="btn btn-danger"type="button" class="cancel" id="cancelar" value="Cncelar">
                                </div>-->
                            </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiPersonal"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	