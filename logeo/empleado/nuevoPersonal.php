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
                        <h5 class="modal-title" id="exampleModalLabel">Contactar</h5>
                        <div id="load_ajax_mPersonal" align="center"></div>
                    </div>
                    				
									<form action="contactar.php" id="formulario" enctype="multipart/form-data" method="post" name="formulario">
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
    							<label for="File">Carta de oferta de empleo o acpetación</label>
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