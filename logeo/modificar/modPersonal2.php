							<div class="form-group">
                            <select name="selm_puesto" id="selm_puesto" class="form-control">
                                <option value="" selected>Seleccione Puesto</option>
								<?php 
									require '../seguridad/conn_mysqli.php';
								    $mk=$conn->query("SELECT *FROM puesto");
                                    $mf=$mk->fetch_assoc();
                                    do 
                                    {
                                        ?>
                                        <option value="<?php echo $mf['idpuesto']; ?>"><?php echo "[ ".$mf['idpuesto']." ] ".$mf['puesto']; ?></option>
                                        <?php
                                    }
                                    while ($mf=$mk->fetch_assoc());
                                ?>
							</select>
                        </div>	
							<div class="form-group">
                            <select name="selm_suc" id="selm_suc" class="form-control">
                                <option value="" selected>Seleccione Sucursal</option>
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