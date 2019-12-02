<?php
	require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
?>
				 <div class="modal-body">                   
								
						<input type="hidden" id="idimp1" class="form-control">
						<div class="row">
								<div class="col-md-6">
									<h6>Sucursal:</h6>
									<div class="form-group">
										<select id="idsuc" class="form-control">
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
										<input type="text"  id="dest" class="form-control" 
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
													id="eloc" 
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
													id="seloc" 
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
										<input type="text"  id="ochi" class="form-control" placeholder="000.00">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>Express CH:</h6>
									<div class="form-group">
										<input type="text" id="echi" class="form-control"
										placeholder="000.00">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>S. Express CH:</h6>
									<div class="form-group">
										<input type="text" id="sechi" class="form-control" 
										placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-4">
									<h6>Ocurre ME:</h6>
									<div class="form-group">
										<input type="email" id="ome" class="form-control" 
										placeholder="000.00">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>Expres ME:</h6>
									<div class="form-group">
										<input type="text"  id="eme" class="form-control" 
										placeholder="000.00">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>S. Expres ME:</h6>
									<div class="form-group">
										<input type="text" id="seme" class="form-control" 
										placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-4">
									<h6>Ocurre GRA:</h6>
									<div class="form-group">
										<input type="email"  id="ogra" class="form-control" 
										placeholder="000.00">
										<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>Expres GRA:</h6>
									<div class="form-group">
										<input type="text" id="egra" class="form-control"
										placeholder="000.00">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese telefono</label>
									</div>
								</div>
								<div class="col-md-4">
									<h6>S. Expres GRA:</h6>
									<div class="form-group">
										<input type="text" id="segra" class="form-control" 
										placeholder="000.00" onblur="this.value=this.value.toUpperCase()">
										<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la direccion</label>
									</div>
								</div>
						</div>
				</div>
                   
					