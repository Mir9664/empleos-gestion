<?php
	require '../seguridad/conn_mysqli.php';
    require '../seguridad/seguridad.php';
?>
<div class="modal-body"> 
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="txt_rfc" id="txt_rfc" class="form-control" 
					placeholder="RFC" onblur="this.value=this.value.toUpperCase()">
					<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese rfc</label>
				</div>
				<div class="form-group">
					<input type="text" name="txt_nombre" id="txt_nombre" class="form-control"
					placeholder="Nombre (s)" onblur="this.value=this.value.toUpperCase()">
					<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
				</div>
					<div class="form-group">
						<input type="number" name="txt_edad" id="txt_edad" 
										min="18" max="70"
										class="form-control" placeholder="Edad" >
						<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese la edad</label>
					</div>                                              
					<div class="form-group">
						<select name="sel_sexo" id="sel_sexo" class="form-control">
							<option value="">Seleccione Sexo</option>
							<option value="H">Masculino</option>
							<option value="M">Femenino</option>
						</select>
						<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
					</div>
					<div class="form-group">
						<input type="email" name="txt_email" id="txt_email" class="form-control" placeholder="Email">
						<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
					</div>
					<div class="form-group">
						<input type="text" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Teléfono">
						<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
					</div>								
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Dirección" onblur="this.value=this.value.toUpperCase()">
					<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
				</div>
				<div class="form-group">
					<input type="text" name="txt_ciudad" id="txt_ciudad" class="form-control" placeholder="Ciudad" onblur="this.value=this.value.toUpperCase()">
					<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
				</div>
				<div class="form-group">
					<input type="text" name="txt_estado" id="txt_estado" class="form-control" placeholder="Estado" onblur="this.value=this.value.toUpperCase()">
					<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
				</div>
				<div class="form-group">
					<input type="text" name="txt_credencial" id="txt_credencial" class="form-control" placeholder="Credencial" onblur="this.value=this.value.toUpperCase()">
					<label id="mensaje1" style="display:none;color:red">Campo Vacio / Ingrese un nombre</label>
				</div>
				<div class="form-group">
					<select name="sel_puesto" id="sel_puesto" class="form-control">
						<option value="">Seleccione Puesto</option>
						<option value="1">Administrador</option>
						<option value="2">Revisor</option>
						<option value="3">Ventas</option>
						<option value="4">Chofer</option>
					</select>
					<label id="mensaje2" style="display:none;color:red">Campo Vacio / Ingrese su Email</label>
				</div>						
				<div class="form-group">
					<select name="sel_suc" id="sel_suc" class="form-control">
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
		</div>
	</div>
</div>				