   <!--NUEVO PERSONAL-->
   <!-- Modal -->
	<div class="modal fade" id="myModal22" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Personal <i class="fa fa-plus"></i></h5>
                        <div id="load_ajax" align="center"></div>
                    </div>
				<div class="modal-body22">
				</div>
				 <div class="modal-footer">
                        <button id="btnAddPersonal" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_salir_aPersonal"><i class="fa fa-sign-out"></i> Salir</button>
                 </div>
			</div>
		</div>
	</div>
	<!--MODIFICAR-ELIMINAR PERSONAL-->
    <div class="col-md-12">
        <div class="modal fade" id="modPersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar/Eliminar Personal</h5>
                        <div id="load_ajax_mPersonal" align="center"></div>
                    </div>
                    <div class="modal-body">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">					
									<input type="hidden" name="txtm_idp" id="txtm_idp" class="form-control">
									<h6>Rfc:</h6>
									<div class="form-group">
										<input type="text" name="txtm_rfc" id="txtm_rfc" 
										disabled
										class="form-control" placeholder="RFC" 
										onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
									</div>
									<h6>Nombre:</h6>
									<div class="form-group">
										<input type="text" name="txtm_nombre" id="txtm_nombre" class="form-control" placeholder="Nombre (s)" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
									</div>
									<h6>Edad:</h6>
									 <div class="form-group">
										<input type="number" 
										min="18" max="70"
										name="txtm_edad" id="txtm_edad" 
										class="form-control" 
										placeholder="Edad" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
									</div>
									<h6>Sexo:</h6>
									<div class="form-group">
										<select name="selm_sexo" id="selm_sexo" class="form-control">
											<option value="">Seleccione Sexo</option>
											<option value="H">Masculino</option>
											<option value="F">Femenino</option>
										</select>
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
									<h6>Email:</h6>
									<div class="form-group">
										<input type="email" name="txtm_email" id="txtm_email" class="form-control" placeholder="Email">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
									<h6>Teléfono:</h6>
									<div class="form-group">
										<input type="text" name="txtm_telefono" id="txtm_telefono" class="form-control" placeholder="Teléfono">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
									
								</div>
								<div class="col-md-6">	
									<h6>Dirección:</h6>
									<div class="form-group">
										<input type="text" name="txtm_dir" id="txtm_dir" class="form-control" placeholder="Dirección" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
									<h6>Ciudad:</h6>
									 <div class="form-group">
										<input type="text" name="txtm_ciu" id="txtm_ciu" class="form-control" placeholder="Ciudad" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la ciudad</label>
									</div>
									<h6>Estado:</h6>
									<div class="form-group">
										<input type="text" name="txtm_est" id="txtm_est" class="form-control" placeholder="Estado" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese el estado</label>
									</div>
									<h6>No. Credencial:</h6>
									<div class="form-group">
										<input type="text" name="txtm_cre" id="txtm_cre" class="form-control" placeholder="Credencial" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la credencial</label>
									</div>
									<h6>Puesto:</h6>
									<div class="form-group">
										<select name="selm_puesto" id="selm_puesto" class="form-control">
											<option value="" selected>Seleccione Puesto</option>
											<option value="">Seleccione Puesto</option>
											<option value="1">Administrador</option>
											<option value="2">Revisor</option>
											<option value="3">Ventas</option>
											<option value="4">Chofer</option>
										</select>
									</div>
									<div id="suc23">						
										<!--COPNTENIDO DE SELECT-->
									</div>
								</div>
							</div>
						</div>						
                    </div>
                    <div class="modal-footer">
                        <button id="btnUpdPersonal" class="btn btn-primary"><i class="fa fa-refresh"></i> Modificar</button>
                        <button id="btnDelPersonal" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiPersonal"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>