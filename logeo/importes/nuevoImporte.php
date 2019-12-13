<!--NUEVO IMPORTE-->
   <div class="modal fade" id="myModal22" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Importe <i class="fa fa-plus"></i></h5>
                        <div id="load_ajax_Importe" align="center"></div>
                    </div>
				<div class="modal-body22">
				
				</div>
				 <div class="modal-footer">
                        <button id="btnUpdImporte" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_salir_aPersonal"><i class="fa fa-sign-out"></i> Salir</button>
                 </div>
			</div>
		</div>
	</div>
	<!--MODIFICAR-ELIMINAR IMPORTES-->
    <div class="col-md-12">
        <div class="modal fade" id="modImporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar/Eliminar Importe</h5>
                        <div id="load_ajax_mImporte" align="center"></div>
                    </div>
                    <div class="modal-body">
						<input type="hidden" id="idimp" class="form-control">
						<div class="row">
								<div class="col-md-6">
									<h6>Sucursal:</h6>
									<div class="form-group">
										<select id="midsuc" class="form-control">
											<option value="">Seleccione Sucursal</option>
											<?php 
												$mk=$conn->query("SELECT *FROM sucursales");
												$mf=$mk->fetch_assoc();
												do 
												{
													?>
													<option value="<?php echo $mf['idsuc']; ?>"><?php echo "[ ".$mf['idsuc']." ] ".$mf['nombres']; ?></option>
													<?php
												}
												while ($mf=$mk->fetch_assoc());
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<h6>Destino:</h6>
									<div class="form-group">
										<input type="text"  id="mdest" class="form-control" 
										placeholder="Destino" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-6">
									<h6>Express L.:</h6>
												 <div class="form-group">
													<input type="number" 
													min="18" max="70"
													id="meloc" 
													class="form-control" 
													placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
													<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
												</div>
								</div>
								<div class="col-md-6">
									<h6>S. Express L.:</h6>
									<div class="form-group">
										<input type="text" 
													min="18" max="70"
													id="mseloc" 
													class="form-control" 
													placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-4">
									<h6>Ocurre CH:</h6>
									<div class="form-group">
										<input type="text"  id="mochi" class="form-control" placeholder="000.00">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>Express CH:</h6>
									<div class="form-group">
										<input type="text" id="mechi" class="form-control"
										placeholder="000.00">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>S. Express CH:</h6>
									<div class="form-group">
										<input type="text" id="msechi" class="form-control" 
										placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-4">
									<h6>Ocurre ME:</h6>
									<div class="form-group">
										<input type="email" id="mome" class="form-control" 
										placeholder="000.00">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>Expres ME:</h6>
									<div class="form-group">
										<input type="text"  id="meme" class="form-control" 
										placeholder="000.00">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>S. Expres ME:</h6>
									<div class="form-group">
										<input type="text" id="mseme" class="form-control" 
										placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-4">
									<h6>Ocurre GRA:</h6>
									<div class="form-group">
										<input type="email"  id="mogra" class="form-control" 
										placeholder="000.00">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>Expres GRA:</h6>
									<div class="form-group">
										<input type="text" id="megra" class="form-control"
										placeholder="000.00">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>S. Expres GRA:</h6>
									<div class="form-group">
										<input type="text" id="msegra" class="form-control" 
										placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
								</div>
						</div>
									
                    </div>
                    <div class="modal-footer">
                        <button id="btnMdImporte" class="btn btn-primary"><i class="fa fa-refresh"></i> Modificar</button>
                        <button id="btnDelImporte" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnExiPersonal"><i class="fa fa-sign-out"></i> Salir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>