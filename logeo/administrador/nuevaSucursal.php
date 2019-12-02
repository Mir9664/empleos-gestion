<div class="col-md-12">
        <div class="modal fade" id="addSucursal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-institution"></i> Nueva Empleo</h5>
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
                        <h5 class="modal-title" id="exampleModalLabel">Modificar/Eliminar Empresa</h5>
                        <div id="load_ajax_mSucursal" align="center"></div>
                    </div> 
                    <div class="modal-body">
                        <input type="hidden" name="mids" id="mids" class="form-control">
                        <div class="form-group">
                            <input type="hidden" name="mcs" id="mcs" class="form-control" placeholder="RFC" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Empresa:</h6>
                        <div class="form-group">
                            <input type="text" name="mns" id="mns" class="form-control" placeholder="Sucursal origen" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						<h6>Datos de Empresa:</h6>
						<div class="form-group">
                            <input type="text" name="md1" id="md1" class="form-control" placeholder="Datos sucursal" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
                        </div>
						
						<h6>Email:</h6>
                        <div class="form-group">
                            <input type="email" name="mems" id="mems" class="form-control" placeholder="Email">
                            <label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
                        </div>
						<h6>Telefono:</h6>
                        <div class="form-group">
                            <input type="text" name="mts" id="mts" class="form-control" placeholder="Teléfono">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
                        </div> 
						<h6>Direccion:</h6>
                        <div class="form-group">
                            <input type="text" name="mds" id="mds" class="form-control" placeholder="Dirección" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
                        </div>
						<h6>Ciudad:</h6>
						 <div class="form-group">
                            <input type="text" name="mcius" id="mcius" class="form-control" placeholder="Ciudad" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la ciudad</label>
                        </div>
						<h6>Estado:</h6>
						<div class="form-group">
                            <input type="text" name="mests" id="mests" class="form-control" placeholder="Estado" onblur="this.value=this.value.toUpperCase()">
                            <label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese el estado</label>
                        </div>                      
                    </div>
                    <div class="modal-footer">
                        <button id="btnUpdSucursal" class="btn btn-primary"><i class="fa fa-refresh"></i> Modificar</button>
                        <button id="btnDelSucursal" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiPersonal"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	