<?php
require '../seguridad/conn_mysqli.php';
require '../seguridad/seguridad.php';
$op=$_POST['dat_op'];
switch ($op) {
case '1': {//AGREGAR PERSONAL
	if (
	!empty($_POST['dat_rfc'])&&
	!empty($_POST['dat_nom'])&& 
	!empty($_POST['dat_ema'])&& 
	!empty($_POST['dat_tel'])&& 
	!empty($_POST['dat_edad'])&& 
	!empty($_POST['dat_sex'])&& 
	!empty($_POST['dat_dir'])&& 
	!empty($_POST['dat_ciu'])&& 
	!empty($_POST['dat_est'])&& 
	!empty($_POST['dat_cred'])&& 
	!empty($_POST['dat_suc'])&& 
	!empty($_POST['dat_pue'])
	) 
	{
		if (isset($_POST['dat_rfc'])) 
		{
			$rfcp=$_POST['dat_rfc'];
			$consulta = "select * from personal where rfcp='$rfcp'";
			$result = $conn->query($consulta);
			$NFilas = $result->num_rows;
			if($NFilas>0)
			{
				?>
				<div class="alert alert-warning" alert>
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Warning!</strong> El registro ya existe.
				</div>
				<?php
			}else{
	
				$dat_rfc=$_POST['dat_rfc'];
				$dat_nom=$_POST['dat_nom'];
				$dat_ema=$_POST['dat_ema'];
				$dat_tel=$_POST['dat_tel'];
				$dat_edad=$_POST['dat_edad'];
				$dat_sex=$_POST['dat_sex'];
				$dat_dir=$_POST['dat_dir'];
				$dat_ciu=$_POST['dat_ciu'];
				$dat_est=$_POST['dat_est'];
				$dat_cred=$_POST['dat_cred'];
				$dat_pue=$_POST['dat_pue'];	
				$dat_suc=$_POST['dat_suc'];	
				$sql_insert=$conn->query("INSERT INTO personal 
				( rfcp,nombrep,edadp,sexop,emailp,telp,direccionp,ciudadp,estadop,credencialp,fk_puesto,idsuc) 
				VALUES ('".$dat_rfc."','".$dat_nom."',".$dat_edad.",'".$dat_sex."','".$dat_ema."','".$dat_tel."','".$dat_dir
				."','".$dat_ciu."','".$dat_est."','".$dat_cred."',".$dat_pue.",".$dat_suc.")");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong>No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;
case '2': {//MODIFICAR PERSONAL
	if (
	isset($_POST['dat_midp']) || 
	isset($_POST['dat_mrfc']) || 
	isset($_POST['dat_mnom']) || 
	isset($_POST['dat_mema']) || 
	isset($_POST['dat_mtel']) || 
	isset($_POST['dat_medad']) || 
	isset($_POST['dat_msex']) ||
	isset($_POST['dat_mdir']) ||
	isset($_POST['dat_mciu']) ||
	isset($_POST['dat_mest']) || 
	isset($_POST['dat_mcre']) || 
	isset($_POST['dat_mpue']) || 
	isset($_POST['dat_msuc']) )
	{
		$midp=$_POST['dat_midp'];
		$mrfc=$_POST['dat_mrfc'];
		$mnom=$_POST['dat_mnom'];
		$mema=$_POST['dat_mema'];
		$mtel=$_POST['dat_mtel'];
		$msex=$_POST['dat_msex'];
		$mdir=$_POST['dat_mdir'];
		$mciu=$_POST['dat_mciu'];
		
		$sql_update=$conn->query("UPDATE personal SET rfcp='".$mrfc."',nombrep='".$mnom."',direccionp='".$mdir."',emailp='".$mema."',telp='".$mtel."',sexop='".$msex."',ciudadp='".$mciu."' WHERE idpersonal=".$midp);
		if ($sql_update) 
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				 <div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div> Error al guardar. <?php echo $conn->error; ?>
			</div>			
			<?php
		}
	}
}break;
case '3': {
	//ELIMINAR tbls_PERSONAL
	if (isset($_POST['del_personal']))
	{
		$id_personal=$_POST['del_personal'];
		$delete_query=$conn->query("DELETE FROM personal WHERE idpersonal=$id_personal");
		if ($delete_query)
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha eliminado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				<strong>Success!</strong> No se ha eliminado. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
}break;

case '7': {//AGREGAR SUCURSAL
	if (
	!empty($_POST['dat_csuc'])&&
	!empty($_POST['dat_nsucursal'])&& 
	!empty($_POST['dat_datos1'])&& 
	!empty($_POST['dat_emails'])&& 
	!empty($_POST['dat_tels'])&& 
	!empty($_POST['dat_dirs'])&& 
	!empty($_POST['dat_ciudads'])&& 
	!empty($_POST['dat_ests'])
	) 
	{
		if (isset($_POST['dat_csuc'])) 
		{
			$csuc=$_POST['dat_csuc'];
			$consulta = "select * from sucursales where claves='$csuc'";
			$result = $conn->query($consulta);
			$NFilas = $result->num_rows;
			if($NFilas>0)
			{
				?>
				<div class="alert alert-warning">
				  <strong>Warning!</strong> El registro ya existe.
				</div>
				<?php
			}else{
				$csuc=$_POST['dat_csuc'];
				$nsucursal=$_POST['dat_nsucursal'];
				$datos1=$_POST['dat_datos1'];
				$emails=$_POST['dat_emails'];
				$tels=$_POST['dat_tels'];
				$dirs=$_POST['dat_dirs'];
				$ciudads=$_POST['dat_ciudads'];
				$ests=$_POST['dat_ests'];					
				$sql_insert=$conn->query("INSERT INTO sucursales 
				(claves,nombres,datoss1,emails,tels,direccions,ciudads,estados) 
				VALUES ('".$csuc."','".$nsucursal."','".$datos1."','".$emails."','".$tels."','".$dirs."','".$ciudads."','".$ests."')");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong>No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;

case '8': {//MODIFICAR SUCURSAL
	if (
	isset($_POST['dat_mids']) || 
	isset($_POST['dat_mcs']) || 
	isset($_POST['dat_mns']) || 
	isset($_POST['dat_md1']) || 
	isset($_POST['dat_mems']) || 
	isset($_POST['dat_mts']) || 
	isset($_POST['dat_mds']) || 
	isset($_POST['dat_mcius']) ||
	isset($_POST['dat_mests'])
	)
	{
		$mids=$_POST['dat_mids'];
		$mcs=$_POST['dat_mcs'];
		$mns=$_POST['dat_mns'];
		$md1=$_POST['dat_md1'];
		$mems=$_POST['dat_mems'];
		$mts=$_POST['dat_mts'];
		$mds=$_POST['dat_mds'];
		$mcius=$_POST['dat_mcius'];
		$mests=$_POST['dat_mests'];	
		$sql_update=$conn->query("UPDATE sucursales SET 
		nombres='".$mns."',
		datoss1='".$md1."',
		emails='".$mems."',
		tels='".$mts."',
		direccions='".$mds."',
		ciudads='".$mcius."',
		estados='".$mests."' WHERE idsuc=".$mids);
		if ($sql_update) 
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				 <div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div> Error al guardar. <?php echo $conn->error; ?>
			</div>			
			<?php
		}
	}
}break;
case '9': {//ELIMINAR SUCURSAL
	//ELIMINAR tbls_PERSONAL
	if (isset($_POST['del_sucursal']))
	{
		$id_sucursal=$_POST['del_sucursal'];
		$delete_query=$conn->query("DELETE FROM sucursales WHERE idsuc=$id_sucursal");
		if ($delete_query)
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha eliminado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				<strong>Success!</strong> No se ha eliminado. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
}break;
case '10': {//AGREGAR MARCAS
	if (isset($_POST['dat_aMarca']))
	{
		$dat_marca=$_POST['dat_aMarca'];
		$sql_insert=$conn->query("INSERT INTO marcas (marca) VALUES ('".$dat_marca."')");
		if ($sql_insert) 
		{
			?>
			<div class="alert alert-warning">
				Se ha guardado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				No se ha guardado la información. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}	
}break;
case '11': {	//MODIFICAR MARCA
	if (isset($_POST['dat_mdi']) || isset($_POST['dat_mpu']))
	{
		$dat_idc=$_POST['dat_mdi'];
		$dat_mar=$_POST['dat_mma'];
		$sql_update=$conn->query("UPDATE marcas SET marca='".$dat_mar."' WHERE idmarca=".$dat_idc);
		if ($sql_update) 
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				No se ha modificado la información. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
	
}break;
case '12': {//ELIMINAR MARCA
	if (isset($_POST['del_marca']))
	{
		$idmarca=$_POST['del_marca'];
		$delete_query=$conn->query("DELETE FROM marcas WHERE idmarca=$idmarca");
		if ($delete_query)
		{
			?>
			<div class="alert alert-warning">
				Se ha eliminado.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				No se ha eliminado. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
}break;
case '13': {//AGREGAR VEHICULO
	if (
	!empty($_POST['dat_fac'])&&
	!empty($_POST['dat_vei'])&& 
	!empty($_POST['dat_ser'])&& 
	!empty($_POST['dat_nm'])&& 
	!empty($_POST['dat_mar'])&& 
	!empty($_POST['dat_anio'])&& 
	!empty($_POST['dat_mod'])&& 
	!empty($_POST['dat_cil'])&& 
	!empty($_POST['dat_trans'])&& 
	!empty($_POST['dat_col'])&& 
	!empty($_POST['dat_puer'])&&
	!empty($_POST['dat_nper'])&&
	!empty($_POST['dat_pla'])&&
	!empty($_POST['dat_com'])&&
	!empty($_POST['dat_proc'])&&
	!empty($_POST['dat_chof'])&&
	!empty($_POST['dat_suc'])
	) 
	{
		if (isset($_POST['dat_fac'])) 
		{
			$rfcp=$_POST['dat_fac'];
			$consulta = "select * from vehiculos where factura='$rfcp'";
			$result = $conn->query($consulta);
			$NFilas = $result->num_rows;
			if($NFilas>0)
			{
				?>
				<div class="alert alert-warning" alert>
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Warning!</strong> El registro ya existe.
				</div>
				<?php
			}else{
				$fac=$_POST['dat_fac'];
				$vei=$_POST['dat_vei'];
				$ser=$_POST['dat_ser'];
				$nm=$_POST['dat_nm'];
				$mar=$_POST['dat_mar'];
				$anio=$_POST['dat_anio'];
				$mod=$_POST['dat_mod'];
				$cil=$_POST['dat_cil'];
				$trans=$_POST['dat_trans'];
				$col=$_POST['dat_col'];
				$puer=$_POST['dat_puer'];	
				$nper=$_POST['dat_nper'];	
				$pla=$_POST['dat_pla'];
				$com=$_POST['dat_com'];
				$proc=$_POST['dat_proc'];
				$chof=$_POST['dat_chof'];
				$idsuc=$_POST['dat_suc'];
				$sql_insert=$conn->query("INSERT INTO vehiculos 
				set
				factura='$fac',
				vehiculo='$vei',
				nserie='$ser',
				nmotor='$nm',
				marca=$mar,
				modelo='$mod',
				anio=$anio,
				cilindros=$cil,
				transmicion=$trans,
				color='$col',
				puertas=$puer,
				npersonas=$nper,
				placas='$pla',
				procedencia=$com,
				combustible=$com,
				idchofer=$chof,
				idsuc=$idsuc
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;
case '14': {//MODIFICAR VEHICULOS
	if (
	!empty($_POST['idv'])&&
	!empty($_POST['idv'])&&
	!empty($_POST['fact2'])&&
	!empty($_POST['vei2'])&&
	!empty($_POST['serie2'])&&
	!empty($_POST['nmotor2'])&&
	!empty($_POST['marca2'])&&
	!empty($_POST['anio2'])&&
	!empty($_POST['modelo2'])&&
	!empty($_POST['trans2'])&&
	!empty($_POST['cil2'])&&
	!empty($_POST['col2'])&&
	!empty($_POST['puer2'])&&
	!empty($_POST['nper2'])&&
	!empty($_POST['pla2'])&&
	!empty($_POST['comb2'])&&
	!empty($_POST['proc2'])&&
	!empty($_POST['chof2'])&&
	!empty($_POST['suc2'])
	) 
	{
		$idv=$_POST['idv'];
		$fact2=$_POST['fact2'];
		$vei2=$_POST['vei2'];
		$serie2=$_POST['serie2'];
		$nmotor2=$_POST['nmotor2'];
		$marca2=$_POST['marca2'];
		$anio2=$_POST['anio2'];
		$modelo2=$_POST['modelo2'];
		$trans2=$_POST['trans2'];
		$cil2=$_POST['cil2'];
		$col2=$_POST['col2'];
		$puer2=$_POST['puer2'];
		$nper2=$_POST['nper2'];
		$pla2=$_POST['pla2'];
		$comb2=$_POST['comb2'];
		$proc2=$_POST['proc2'];
		$chof2=$_POST['chof2'];
		$suc2=$_POST['suc2'];
		
		$sql_update=$conn->query("UPDATE vehiculos SET 
		factura='".$fact2."',
		vehiculo='".$vei2."',
		nserie='".$serie2."',
		nmotor='".$nmotor2."',
		marca=".$marca2.",
		modelo='".$modelo2."',
		anio=".$anio2.",
		cilindros=".$cil2.",
		transmicion=".$trans2.",
		color='".$col2."',
		puertas=".$puer2.",
		npersonas=".$nper2.",
		placas='".$pla2."',
		procedencia=".$proc2.",
		combustible=".$comb2.",
		idchofer=".$chof2.",
		idsuc=".$suc2." 
		WHERE idvehiculo=$idv");
		if ($sql_update) 
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				 <div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div> Error al guardar. <?php echo $conn->error; ?>
			</div>			
			<?php
		}
	}
}break;
case '15': {//ELIMINAR VEHICULO
	if (isset($_POST['idv']))
	{
		$idv=$_POST['idv'];
		$delete_query=$conn->query("DELETE FROM vehiculos WHERE idvehiculo=$idv");
		if ($delete_query)
		{
			?>
			<div class="alert alert-warning">
				Se ha eliminado.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				No se ha eliminado. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
}break;
case '19': {//AGREGAR REMITENTE O DESTINATARIO
	if (
	//!empty($_POST['rfcr'])&& 
	!empty($_POST['remitente'])&& 
	!empty($_POST['domicilior'])&& 
	//!empty($_POST['coloniar'])&& 
	//!empty($_POST['poblacionr'])&&
	!empty($_POST['coloniar'])&&
	!empty($_POST['ciudadr'])&&
	//!empty($_POST['estador'])&&
	//!empty($_POST['coloniar'])&&
	//!empty($_POST['cpr'])&&
	!empty($_POST['tel1r'])
	//!empty($_POST['tel2r'])&&
	//!empty($_POST['emailr']
	) 
	{
		if (isset($_POST['remitente'])) 
		{
			$rfcr=($_POST['rfcr']);
			$remitente=($_POST['remitente']); 
			$domicilior=($_POST['domicilior']); 
			$coloniar=($_POST['coloniar']); 
			$poblacionr=($_POST['poblacionr']);
			$coloniar=($_POST['coloniar']);
			$ciudadr=($_POST['ciudadr']);
			$estador=($_POST['estador']);
			$coloniar=($_POST['coloniar']);
			$cpr=($_POST['cpr']);
			$tel1r=($_POST['tel1r']);
			$tel2r=($_POST['tel2r']);
			$emailr=($_POST['emailr']);
			$obs=($_POST['obs']);
			$consulta = "
			select * from remitentedestinatario where rfcrd='$rfcr' 
			";
			$result = $conn->query($consulta);
			$NFilas = $result->num_rows;
			if($NFilas=='-220')
			{
				?>
				<div class="alert alert-warning" alert>
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Warning!</strong> El registro ya existe.
				</div>
				<?php
			}else{				
				$sql_insert=$conn->query("
				INSERT INTO remitentedestinatario set
				rfcrd='$rfcr', 
				nombrerd='$remitente', domiciliord='$domicilior',
				coloniard='$coloniar',
				poblacionrm='$poblacionr', ciudadrd='$ciudadr', 
				estadord='$estador', cprd='$cpr', 
				telefono1rd='$tel1r',telefono2rd='$tel2r', correord='$emailr', observaciones='$obs'
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;
case '47': {//MODIFICAR R/D CLIENTE
	if (
	//!empty($_POST['rfcr'])&& 
	!empty($_POST['remitente'])&& 
	!empty($_POST['domicilior'])&& 
	//!empty($_POST['coloniar'])&& 
	//!empty($_POST['poblacionr'])&&
	!empty($_POST['coloniar'])&&
	!empty($_POST['ciudadr'])&&
	//!empty($_POST['estador'])&&
	//!empty($_POST['coloniar'])&&
	//!empty($_POST['cpr'])&&
	!empty($_POST['tel1r'])
	//!empty($_POST['tel2r'])&&
	//!empty($_POST['emailr']
	) 
	{
		if (isset($_POST['remitente'])) 
		{
			$midrd=($_POST['midrd']);
			$rfcr=($_POST['rfcr']);
			$remitente=($_POST['remitente']); 
			$domicilior=($_POST['domicilior']); 
			$coloniar=($_POST['coloniar']); 
			$poblacionr=($_POST['poblacionr']);
			$coloniar=($_POST['coloniar']);
			$ciudadr=($_POST['ciudadr']);
			$estador=($_POST['estador']);
			$coloniar=($_POST['coloniar']);
			$cpr=($_POST['cpr']);
			$tel1r=($_POST['tel1r']);
			$tel2r=($_POST['tel2r']);
			$emailr=($_POST['emailr']);
			$obs=($_POST['obs']);
			$consulta = "
			select * from remitentedestinatario where rfcrd='$rfcr' 
			";
			$result = $conn->query($consulta);
			$NFilas = $result->num_rows;
			if($NFilas=='-220')
			{
				?>
				<div class="alert alert-warning" alert>
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Warning!</strong> El registro ya existe.
				</div>
				<?php
			}else{				
				$sql_insert=$conn->query("
				update remitentedestinatario set
				rfcrd='$rfcr', 
				nombrerd='$remitente', domiciliord='$domicilior',
				coloniard='$coloniar',
				poblacionrm='$poblacionr', ciudadrd='$ciudadr', 
				estadord='$estador', cprd='$cpr', 
				telefono1rd='$tel1r',telefono2rd='$tel2r', correord='$emailr',
				observaciones='$obs'
				where
				idpersonard=$midrd
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
			}
		}
	}else{
		$midrd=($_POST['midrd']);
			$rfcr=($_POST['rfcr']);
			$remitente=($_POST['remitente']); 
			$domicilior=($_POST['domicilior']); 
			$coloniar=($_POST['coloniar']); 
			$poblacionr=($_POST['poblacionr']);
			$coloniar=($_POST['coloniar']);
			$ciudadr=($_POST['ciudadr']);
			$estador=($_POST['estador']);
			$coloniar=($_POST['coloniar']);
			$cpr=($_POST['cpr']);
			$tel1r=($_POST['tel1r']);
			$tel2r=($_POST['tel2r']);
			$emailr=($_POST['emailr']);
		echo "update remitentedestinatario set
				rfcrd='$rfcr', 
				nombrerd='$remitente', domiciliord='$domicilior',
				coloniard='$coloniar',
				poblacionrm='$poblacionr', ciudadrd='$ciudadr', 
				estadord='$estador', cprd='$cpr', 
				telefono1rd='$tel1r',telefono2rd='$tel2r', correord='$emailr'
				where
				idpersonard=$midrd";
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;
case '48': {//ELIMINAR R/D CLIENTE
	if (!empty($_POST['midrd'])) 
	{
				$midrd=$_POST['midrd'];
				$sql_insert=$conn->query("
				DELETE FROM remitentedestinatario 
				where
				idpersonard=$midrd
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha eliminado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha eliminado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}

	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;
case '20': {//AGREGAR SERVICIO
	if (
	!empty($_POST['rfcr1'])&& 
	!empty($_POST['rfcr2'])&& 
	!empty($_POST['cantidad'])&&
	!empty($_POST['peso'])&&
	!empty($_POST['ancho'])&&
	!empty($_POST['largo'])&&
	!empty($_POST['alto'])&&
	!empty($_POST['valor'])&&
	!empty($_POST['password'])&&
	!empty($_POST['acuse'])&&
	!empty($_POST['tempaque'])&&
	!empty($_POST['contenido'])&&
	!empty($_POST['dentrega'])&&
	!empty($_POST['denvio'])&&
	!empty($_POST['direccionpo'])&&	
	!empty($_POST['idsucdest'])&& 
	!empty($_POST['tamano'])&& 
	!empty($_POST['tiposervicio'])&& 
	!empty($_POST['destino'])&& 
	!empty($_POST['importe'])	
	) 
	{
		if (isset($_POST['rfcr1'])) 
		{
			$rfcr1=($_POST['rfcr1']);
			$rfcr2=($_POST['rfcr2']);
			$tamano=($_POST['tamano']);
			$idsucdest=($_POST['idsucdest']);
			$cantidad=($_POST['cantidad']);
			$peso=($_POST['peso']);
			$ancho=($_POST['ancho']);
			$largo=($_POST['largo']);
			$alto=($_POST['alto']);
			$valor=($_POST['valor']);
			$password=($_POST['password']);
			$acuse=($_POST['acuse']);
			$tempaque=($_POST['tempaque']);
			$contenido=($_POST['contenido']);
			$dentrega=($_POST['dentrega']);
			$denvio=($_POST['denvio']);
			$direccionpo=($_POST['direccionpo']);
			$direccionent=($_POST['direccionent']);
			$tiposervicio=($_POST['tiposervicio']);
			$destino=($_POST['destino']);
			$importe=($_POST['importe']);
			$importeext=($_POST['importeext']);
			if($tiposervicio==4 || $tiposervicio==5){
				$estatus=5;
			}else{$estatus=1;}
			date_default_timezone_set('UTC');
			date_default_timezone_set("America/Mexico_City");	
			$f=date('Y-m-d');
			$h=date('H:i:s');
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr1'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idr=$row2['idpersonard'];
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr2'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idd=$row2['idpersonard'];
				$sql_insert=$conn->query("
				INSERT INTO servicio set
				idremitente=$idr, iddestinatario=$idd, 
				cadenaservicio='xxxx', fechas='$f', 
				horas='$h', tamano=$tamano, 
				cantidad=$cantidad,peso=$peso, ancho=$ancho, 
				largo=$largo, alto=$alto,valor=$valor, 
				passwordresencion='$password', ciudaddest=$idsucdest,
				acuserecibido=$acuse, tipoenpaque=$tempaque, 
				contenido=$contenido, descripcionenvio='$denvio', 
				descripcionentrega='$dentrega',direccionpo=$direccionpo,
				direccionent='$direccionent',tiposervicio=$tiposervicio,
				destino=$destino,importe=$importe,montoext=$importeext,estatus=$estatus,
				entregadest=7,idsuc=$suc
				");
				if ($sql_insert) 
				{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = true;
					
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
					
					
					?>
					<!--<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>-->
					<?php
				}
				else
				{
					?>
					<!--<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
					</div>-->
					<?php
				}
		}
	}else{
		?>
		<!--<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>-->
		<?php
	}
}break;
case '21': {//ACTUALIZAR SERVICIO
	if (
	!empty($_POST['idserv'])&& 
	!empty($_POST['rfcr1'])&& 
	!empty($_POST['rfcr2'])&& 
	!empty($_POST['tamano'])&& 
	!empty($_POST['tipo'])&& 
	!empty($_POST['cantidad'])&&
	!empty($_POST['peso'])&&
	!empty($_POST['ancho'])&&
	!empty($_POST['largo'])&&
	!empty($_POST['alto'])&&
	!empty($_POST['valor'])&&
	!empty($_POST['password'])&&
	!empty($_POST['acuse'])&&	
	!empty($_POST['tempaque'])&&
	!empty($_POST['contenido'])&&
	!empty($_POST['dentrega'])&&
	!empty($_POST['denvio'])&&	
	!empty($_POST['direccionpo'])&&
	!empty($_POST['tamano'])&&
	!empty($_POST['tipo'])&&
	!empty($_POST['dest'])&&	
	!empty($_POST['midsucdest'])
	) 
	{
		if (isset($_POST['idserv'])) 
		{
			$idserv=($_POST['idserv']);
			$rfcr1=($_POST['rfcr1']);
			$rfcr2=($_POST['rfcr2']);
			$tamano=($_POST['tamano']);
			$tipo=($_POST['tipo']);
			$cantidad=($_POST['cantidad']);
			$peso=($_POST['peso']);
			$ancho=($_POST['ancho']);
			$largo=($_POST['largo']);
			$alto=($_POST['alto']);
			$valor=($_POST['valor']);
			$password=($_POST['password']);
			$acuse=($_POST['acuse']);
			$tempaque=($_POST['tempaque']);
			$contenido=($_POST['contenido']);
			$dentrega=($_POST['dentrega']);
			$denvio=($_POST['denvio']);
			$direccionpo=($_POST['direccionpo']);
			$direccionent=($_POST['direccionpodesc']);
			$tipo=($_POST['tipo']);
			$dest=($_POST['dest']);
			$importe=($_POST['importe']);
			$midsucdest=($_POST['midsucdest']);
			$importeext=($_POST['montoext']);
			$adeudos=($_POST['adeudoss']);
			date_default_timezone_set('UTC');
			date_default_timezone_set("America/Mexico_City");	
			$f=date('Y-m-d');
			$h=date('H:i:s');
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr1'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idr=$row2['idpersonard'];
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr2'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idd=$row2['idpersonard'];						
				$sql_insert=$conn->query("
				update servicio set
				idremitente=$idr, iddestinatario=$idd, 
				cadenaservicio='xxxx', fechas='$f', 
				horas='$h', tamano=$tamano, 
				cantidad=$cantidad,peso=$peso, ancho=$ancho, 
				largo=$largo, alto=$alto,valor=$valor, 
				passwordresencion='$password',ciudaddest=$midsucdest, 
				acuserecibido=$acuse, tipoenpaque=$tempaque, 
				contenido=$contenido, descripcionenvio='$denvio', 
				descripcionentrega='$dentrega',direccionpo=$direccionpo,
				direccionent='$direccionent',tiposervicio=$tipo,
				destino=$dest,importe=$importe,montoext=$importeext,
				adeudos=$adeudos					
				where idservicio=$idserv
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
		}
	}else{		
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos 2.
		</div>
		<?php
	}
}break;
case '27': {//MODIFICAR PASSWORD DE USUARIO
	if(
	!empty($_POST['idp'])&&
	!empty($_POST['pass1'])&& 
	!empty($_POST['pass2'])
	) 
	{
		$idp=($_POST['idp']);
		$p1=md5(trim($_POST['pass1'])); 
		$p2=md5(trim($_POST['pass2']));
		if ($p1==$p2)
        {
            $update_query=$conn->query("UPDATE personal SET passwordp='".$p1."' WHERE idpersonal=$idp");
            if ($update_query)
            {
            	?>
	        	<div class="alert alert-success">
	        		Se ha modificado la información.
	        	</div>
	        	<?php
            }
        }
        else
        {
        	?>
        	<div class="alert alert-warning">
        		Los password son diferentes.
        	</div>
        	<?php
        }
	}else
	{
		?>
        	<div class="alert alert-warning">
        		No se ha modificado la información
        	</div>
        <?php
	}
}break;
case '28': {//ACTIVA VEHICULO Y CHOFER
	/*echo ($_POST['idcor']);
	echo ($_POST['idvei']);
	echo ($_POST['adv01']);*/
	if (
	!empty($_POST['idcor'])&& 
	!empty($_POST['idvei'])&& 
	!empty($_POST['idper'])&&
	!empty($_POST['adv01'])	
	) 
	{
		if (isset($_POST['idvei'])) 
		{
			$idvei=$_POST['idvei'];
			$idper=$_POST['idper'];
			$adv01=($_POST['adv01']);
			$sql_insert=$conn->query("update vehiculos set activo=1 where idvehiculo=$idvei");
			$sql_insert2=$conn->query("update personal set activo=1 where idpersonal=$idper");
			if ($sql_insert) 
			{
			?>
				<div class="alert alert-success">
				 <strong>Success!</strong> Se ha activado el vehiculo y chofer
				</div>
			<?php
			}
			else
			{
			?>
				<div class="alert alert-danger">
					 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
				</div>
			<?php
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> No hay datos suficientes.
		</div>
		<?php
	}
}break;
case '29': {//DESACTIVA VEHICULO Y CHOFER
	/*echo ($_POST['idcor']);
	echo ($_POST['idvei']);
	echo ($_POST['adv01']);*/
	if (
	!empty($_POST['idcor'])&& 
	!empty($_POST['idper'])&& 
	!empty($_POST['idvei'])
	) 
	{
		if (isset($_POST['idvei'])) 
		{
			$idvei=$_POST['idvei'];
			$adv01=($_POST['adv01']);
			$idper=$_POST['idper'];
			$sql_insert=$conn->query("update vehiculos set activo=0 where idvehiculo=$idvei");			
			$sql_insert2=$conn->query("update personal set activo=0 where idpersonal=$idper");			
			if ($sql_insert) 
			{
			?>
				<div class="alert alert-success">
				 <strong>Success!</strong> Se ha desactivado vehiculo y chofer
				</div>
			<?php
			}
			else
			{
			?>
				<div class="alert alert-danger">
					 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
				</div>
			<?php
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> No hay datos suficientes.
		</div>
		<?php
	}
}break;

case '30': {//AGRUPAR SERVICIOS PARA ENLACE
	if(isset($_POST["id"]) && isset($_POST["rep"]) && 
	isset($_POST["linea"]) && 
	isset($_POST["cd"]))
	{
	 $id2='';
	 $rep=$_POST["rep"];
	 $lin=$_POST["linea"];
	 $costoenviolt=$_POST["costoenviolt"];
	 $cd=$_POST["cd"];//ciudad destino
	 $consulta="select * from personal p where rfcp='RECOLECTOR'";
	 $recordset=$conn->query($consulta);
	 $row2=$recordset->fetch_assoc();	
	 $idp=$row2['idpersonal'];
	 date_default_timezone_set('UTC');
	 date_default_timezone_set("America/Mexico_City");
	 $f=date('Y-m-d');
	 $h=date('H:i:s');
	 $rs=$conn->query("insert into seguimiento set 
			idrapartidor=$rep,
			idlineat=$lin,
			idrecolector=$idp,
			horaenviolt='$h',
			fechaenviolt='$f',
			costoenviolt=$costoenviolt,
			idsuc=$suc,
			iddest=$cd;
			");
	 $rs = $conn->query("SELECT MAX(idseguimiento) AS ids FROM seguimiento");
	 if ($row = $rs->fetch_assoc()) {
		$ids= trim($row["ids"]);
	 }
	
	 foreach($_POST["id"] as $id)
	 {
			/*$sql_insert=$conn->query("update servicio set 
			estatus=6
			where
			idservicio=$id
			");*/
			$sql_insert=$conn->query("update servicio set 
			estatus=6,
			entregadest=$rep,
			idseguimiento=$ids
			where
			idservicio=$id
			");
			
			$f2=date('Y-m-d H:i:s');
			$sql_insert=$conn->query("insert into listaseguimiento set 
			idseguimiento=$ids,
			idservicio=$id
			");
			
			if ($sql_insert) 
			{
				$id2=$id2.' '.$id;
			}
	 }
	 ?>
				<div class="alert alert-success">
				 <strong>Servicio en paquete:</strong> <?php echo $id2;?>
				</div>
			<?php
	}
}break;
case '31': {//ACTUALIZAR SEGUIMIENTO EN TRAYECTO(4)
	if (
	!empty($_POST['ids'])&& 
	!empty($_POST['fe'])&& 
	!empty($_POST['he'])) 
	{
		if (isset($_POST['ids'])) 
		{
			$ids=$_POST['ids'];
			$fe=$_POST['fe'];
			$he=($_POST['he']);
			$hll=($_POST['hll']);
			$ce=intval($_POST['ce']);
			
			$sql_insert=$conn->query("
			update servicio s, listaseguimiento ls, seguimiento ss 
			set 
			estatus=6 where ss.idseguimiento=$ids and 
			ls.idseguimiento=ss.idseguimiento and 
			s.idservicio=ls.idservicio
			");
			$sql_insert=$conn->query("update seguimiento set 
			fechaenviolt='$fe',
			horaenviolt='$he',
			horallegadalt='$hll',
			costoenviolt=$ce
			where idseguimiento=$ids");
			/*$sql_insert=$conn->query("update seguimiento set 
			fechaenviolt='$fe',
			horaenviolt='$he',
			horallegadalt='$hll',
			costoenviolt=$ce,
			recisuc=1
			where idseguimiento=$ids");*/
			if ($sql_insert) 
			{
			?>
				<div class="alert alert-success">
				 <strong>Success!</strong> Actualizacion realizada
				</div>
			<?php
			}
			else
			{
			?>
				<div class="alert alert-danger">
					 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
				</div>
			<?php
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> No hay datos suficientes.
		</div>
		<?php
	}
}break;
case '32': {//RECOLECTOR SERVICIOS
	if(isset($_POST["id"]) && isset($_POST["rep"]))
	{
	 $id2='';
	 $rep=$_POST["rep"];
	 date_default_timezone_set('UTC');
	 date_default_timezone_set("America/Mexico_City");
	 foreach($_POST["id"] as $id)
	 {
			$f2=date('Y-m-d H:i:s');
			$sql_insert=$conn->query("
			update servicio s, listaseguimiento ls, seguimiento ss 
			set 
			estatus=4 where ss.idseguimiento=$id and 
			ls.idseguimiento=ss.idseguimiento and 
			s.idservicio=ls.idservicio
			");
			
			$sql_insert=$conn->query("update seguimiento set 
			idrecolector=$rep, recisuc=2
			where
			idseguimiento=$id
			");
			if ($sql_insert) 
			{
				$id2=$id2.' '.$id;
			}
	 }
	 ?>
				<div class="alert alert-success">
				 <strong>Servicio en paquete:</strong> <?php echo $id2;?>
				</div>
			<?php
	}
}break;
case '33': {//RECOLECTOR SERVICIOS
	if(isset($_POST["id"]))
	{
	 $id2='';
	 date_default_timezone_set('UTC');
	 date_default_timezone_set("America/Mexico_City");
	 foreach($_POST["id"] as $id)
	 {
			$f2=date('Y-m-d H:i:s');
			$sql_insert=$conn->query("
			update servicio s, listaseguimiento ls, seguimiento ss 
			set 
			estatus=5 where ss.idseguimiento=$id and 
			ls.idseguimiento=ss.idseguimiento and 
			s.idservicio=ls.idservicio
			");			
			$sql_insert=$conn->query("update seguimiento set 
			recisuc=3
			where
			idseguimiento=$id
			");
			if ($sql_insert) 
			{
				$id2=$id2.' '.$id;
			}
	 }
	 ?>
				<div class="alert alert-success">
				 <strong>Servicio en paquete:</strong> <?php echo $id2;?>
				</div>
			<?php
	}
}break;
case '34': {//REPARTIDOR DESTINO(6)
	if(isset($_POST["id"]) && isset($_POST["rep"]))
	{
	 $id2='';
	 $rep=$_POST["rep"];
	 foreach($_POST["id"] as $id)
	 {
			$sql_insert=$conn->query("update servicio set 
			estatus=6,
			entregadest=$rep			
			where
			idservicio=$id
			");
			if ($sql_insert) 
			{
				$id2=$id2.' '.$id;
			}
	 }
	 ?>
				<div class="alert alert-success">
				 <strong>Servicio en paquete:</strong> <?php echo $id2;?>
				</div>
			<?php
	}
}break;
case '35': {//REPARTIDOR DESTINO(6)
	if(isset($_POST["id"]) && isset($_POST["rep"]))
	{
	 $id2='';
	 $rep=$_POST["rep"];
	 foreach($_POST["id"] as $id)
	 {
			$sql_insert=$conn->query("update servicio set 
			estatus=$rep
			where
			idservicio=$id
			");
			if ($sql_insert) 
			{
				$id2=$id2.' '.$id;
			}
	 }
	 ?>
				<div class="alert alert-success">
				 <strong>Servicio en paquete:</strong> <?php echo $id2;?>
				</div>
			<?php
	}
}break;
case '36': {//ENTREGADO/DEVUELTO 7 Y 8
	if (
	!empty($_POST['ids'])&& 
	!empty($_POST['est'])&& 
	!empty($_POST['obsed'])&&
	!empty($_POST['ades'])	
	) 
	{
		if (isset($_POST['ids'])) 
		{
			$ids=$_POST['ids'];
			$est=$_POST['est'];
			$obsed=$_POST['obsed'];
			$ades=($_POST['ades']);
			date_default_timezone_set('UTC');
			date_default_timezone_set("America/Mexico_City");
			$f2=date('Y-m-d H:i:s');
			$sql_insert=$conn->query("update servicio set 
			estatus=$est,
			obsed='$obsed',
			fechae='$f2',
			adeudos=$ades
			where idservicio=$ids");
			if ($sql_insert) 
			{
			?>
				<div class="alert alert-success">
				 <strong>Success!</strong> Actualizacion realizada
				</div>
			<?php
			}
			else
			{
			?>
				<div class="alert alert-danger">
					 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
				</div>
			<?php
			}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> No hay datos suficientes.
		</div>
		<?php
	}
}break;
case '37': {//ACTUALIZAR IMPORTE
	if (
	!empty($_POST['midimp'])&& 
	!empty($_POST['midsuc'])&& 
	!empty($_POST['mdest'])&& 
	!empty($_POST['meloc'])&& 
	!empty($_POST['mseloc'])&& 
	!empty($_POST['mochi'])&& 
	!empty($_POST['mechi'])&& 
	!empty($_POST['msechi'])&& 
	!empty($_POST['mome'])&& 
	!empty($_POST['meme'])&& 
	!empty($_POST['mseme'])&& 
	!empty($_POST['mogra'])&& 
	!empty($_POST['megra'])&& 
	!empty($_POST['msegra'])
	) 
	{
		if (isset($_POST['midimp'])) 
		{
			$midimp=$_POST['midimp']; 
			$midsuc=$_POST['midsuc'];
			$mdest=$_POST['mdest'];
			$meloc=$_POST['meloc']; 
			$mseloc=$_POST['mseloc'];
			$mochi=$_POST['mochi'];
			$mechi=$_POST['mechi']; 
			$msechi=$_POST['msechi'];
			$mome=$_POST['mome']; 
			$meme=$_POST['meme']; 
			$mseme=$_POST['mseme']; 
			$mogra=$_POST['mogra']; 
			$megra=$_POST['megra']; 
			$msegra=$_POST['msegra'];
			$sql_insert=$conn->query("update importes set 
			idsuc=$midsuc,
			destino='$mdest', 
			ocurre_chi=$mochi,
			express_chi=$mechi,
			superexpress_chi=$msechi,
			ocurre_me=$mome, 
			express_me=$meme, 
			superexpress_me=$mseme,
			ocurre_gra=$mogra,
			express_gra=$megra,
			superexpress_gra=$msegra, 
			express_loc=$meloc, 
			superexpress_loc=$mseloc
			where idimportes=$midimp");
			if ($sql_insert) 
			{
			?>
				<div class="alert alert-success">
				 <strong>Success!</strong> Actualizacion realizada
				</div>
			<?php
			}
			else
			{
			?>
				<div class="alert alert-danger">
					 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
				</div>
			<?php
			}
		}
	}else{		
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> No hay datos suficientes.
		</div>
		<?php
	}
}break;
case '38': {//AGREGAR IMPORTE
	if (
	!empty($_POST['midsuc'])&& 
	!empty($_POST['mdest'])&& 
	!empty($_POST['meloc'])&& 
	!empty($_POST['mseloc'])&& 
	!empty($_POST['mochi'])&& 
	!empty($_POST['mechi'])&& 
	!empty($_POST['msechi'])&& 
	!empty($_POST['mome'])&& 
	!empty($_POST['meme'])&& 
	!empty($_POST['mseme'])&& 
	!empty($_POST['mogra'])&& 
	!empty($_POST['megra'])&& 
	!empty($_POST['msegra'])
	) 
	{
			$midsuc=$_POST['midsuc'];
			$mdest=$_POST['mdest'];
			$meloc=$_POST['meloc']; 
			$mseloc=$_POST['mseloc'];
			$mochi=$_POST['mochi'];
			$mechi=$_POST['mechi']; 
			$msechi=$_POST['msechi'];
			$mome=$_POST['mome']; 
			$meme=$_POST['meme']; 
			$mseme=$_POST['mseme']; 
			$mogra=$_POST['mogra']; 
			$megra=$_POST['megra']; 
			$msegra=$_POST['msegra'];
			$sql_insert=$conn->query("insert into importes set 
			idsuc=$midsuc,
			destino='$mdest', 
			ocurre_chi=$mochi,
			express_chi=$mechi,
			superexpress_chi=$msechi,
			ocurre_me=$mome, 
			express_me=$meme, 
			superexpress_me=$mseme,
			ocurre_gra=$mogra,
			express_gra=$megra,
			superexpress_gra=$msegra, 
			express_loc=$meloc, 
			superexpress_loc=$mseloc
			");
			if ($sql_insert) 
			{
			?>
				<div class="alert alert-success">
				 <strong>Success!</strong> Actualizacion realizada
				</div>
			<?php
			}
			else
			{
			?>
				<div class="alert alert-danger">
					 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
				</div>
			<?php
			}
		
	}else{		
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> No hay datos suficientes.
		</div>
		<?php
	}
}break;
case '39': {//ELIMINAR IMPORTE
	if(
	!empty($_POST['idi'])
	) 
	{
		$idi=($_POST['idi']);
		
            $update_query=$conn->query("delete from importes where idimportes=$idi");
            if ($update_query)
            {
            	?>
	        	<div class="alert alert-success">
	        		Se ha eliminado la información.
	        	</div>
	        	<?php
            }
			else
			{
				?>
				<div class="alert alert-warning">
					<strong>Danger!</strong> No se ha eliminado la información. <?php echo $conn->error; ?>
				</div>
				<?php
			}
	}else
	{
		?>
        	<div class="alert alert-warning">
        		Falta datos para eliminar
        	</div>
        <?php
	}
}break;
case '41': {//NUEVO AUTRANSPORTE
	if (
	isset($_POST['ca']) || 
	isset($_POST['au']) || 
	isset($_POST['cont']) || 
	isset($_POST['em']) || 
	isset($_POST['tel']) || 
	isset($_POST['dir']) || 
	isset($_POST['suc']) ||
	isset($_POST['es'])
	)
	{
		$ca=$_POST['ca'];
		$consulta = "select * from lineastransportistas where clavel='$ca'";
		$result = $conn->query($consulta);
		$NFilas = $result->num_rows;
		if($NFilas>0)
		{
			?>
			<div class="alert alert-warning" alert>
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Warning!</strong> El registro ya existe.
			</div>
			<?php
		}else{
			$ca=$_POST['ca'];
			$au=$_POST['au'];
			$cont=$_POST['cont'];
			$em=$_POST['em'];
			$tel=$_POST['tel'];
			$dir=$_POST['dir'];
			$suc=$_POST['suc'];
			$es=$_POST['es'];	
			$sql_update=$conn->query("insert into lineastransportistas set 
			clavel='$ca',
			linea='$au',
			direccion='$dir',
			telefono='$tel',
			email='$em',
			contacto='$cont',
			idsuc=$suc,
			estado='$es'");
			if ($sql_update) 
			{
				?>
				<div class="alert alert-success">
							 <strong>Success!</strong> Se ha insertado la información.
				</div>
				<?php
			}
			else
			{
				?>
				<div class="alert alert-warning">
					 Error al guardar. <?php echo $conn->error; ?>
				</div>			
				<?php
			}
		}
	}
}break;
case '40': {//MODIFICAR AUTRANSPORTES
	if (
	isset($_POST['id']) || 
	isset($_POST['ca']) || 
	isset($_POST['au']) || 
	isset($_POST['cont']) || 
	isset($_POST['em']) || 
	isset($_POST['tel']) || 
	isset($_POST['dir']) || 
	isset($_POST['suc']) ||
	isset($_POST['es'])
	)
	{
		$id=$_POST['id'];
		$ca=$_POST['ca'];
		$au=$_POST['au'];
		$cont=$_POST['cont'];
		$em=$_POST['em'];
		$tel=$_POST['tel'];
		$dir=$_POST['dir'];
		$suc=$_POST['suc'];
		$es=$_POST['es'];	
		$sql_update=$conn->query("UPDATE lineastransportistas SET 
		clavel='$ca',
		linea='$au',
		direccion='$dir',
		telefono='$tel',
		email='$em',
		contacto='$cont',
		idsuc=$suc,
		estado='$es' WHERE idlineat=".$id);
		if ($sql_update) 
		{
			?>
			<div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				 <div class="alert alert-success">
						 <strong>Success!</strong> Se ha modificado la información.
			</div> Error al guardar. <?php echo $conn->error; ?>
			</div>			
			<?php
		}
	}
}break;
case '42': {//ELIMINAR AUTOTRANSPORTE
	if (isset($_POST['id']))
	{
		$id=$_POST['id'];
		$delete_query=$conn->query("DELETE FROM lineastransportistas WHERE idlineat=".$id);
		if ($delete_query)
		{
			?>
			<div class="alert alert-warning">
				Se ha eliminado.
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				No se ha eliminado. <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
}break;
default:	
case '43': {//ELIMINAR SERVICIO
	if (
	!empty($_POST['idserv'])	
	) 
	{
		if (isset($_POST['idserv'])) 
		{
			$idserv=($_POST['idserv']);
			$sql_insert=$conn->query("delete from listaseguimiento where idservicio=$idserv");
			$sql_insert=$conn->query("delete from seguimiento where idservicio=$idserv");
			$sql_insert=$conn->query("delete from servicio where idservicio=$idserv
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha eliminado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha eliminado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Faltan datos.
		</div>
		<?php
	}
}break;
case '44': {//AGREGAR SERVICIO PARA DEVOLUCION
	if (
	!empty($_POST['rfcr1'])&& 
	!empty($_POST['rfcr2'])&&
	!empty($_POST['tamano'])&&
	!empty($_POST['dest'])&&
	!empty($_POST['cantidad'])&&
	!empty($_POST['peso'])&&
	!empty($_POST['ancho'])&&
	!empty($_POST['largo'])&&
	!empty($_POST['alto'])&&
	!empty($_POST['valor'])&&
	!empty($_POST['password'])&&
	!empty($_POST['acuse'])&&
	!empty($_POST['tempaque'])&&
	!empty($_POST['contenido'])&&
	!empty($_POST['dentrega'])&&
	!empty($_POST['denvio'])&&
	!empty($_POST['direccionpo'])&&
	!empty($_POST['dentrega'])&&
	!empty($_POST['tipo'])&&
	!empty($_POST['dest'])&&
	!empty($_POST['importe'])&&
	!empty($_POST['importeext2'])&&
	!empty($_POST['importe'])	
	) 
	{
		if (isset($_POST['rfcr1'])) 
		{
			$rfcr1=$_POST['rfcr1'];
			$rfcr2=$_POST['rfcr2'];
			$tamano= $_POST['tamano'];
			$cantidad=$_POST['cantidad'];
			$peso= $_POST['peso'];
			$ancho= $_POST['ancho'];
			$largo= $_POST['largo'];
			$alto=$_POST['alto'];
			$valor= $_POST['valor'];
			$password= $_POST['password'];
			$idsucdest=
			$acuse= $_POST['acuse'];
			$tempaque= $_POST['tempaque'];
			$contenido=$_POST['contenido'];
			$denvio= $_POST['denvio'];
			$dentrega=$_POST['dentrega'];
			$direccionpo=$_POST['direccionpo'];
			$direccionent=$_POST['dentrega'];
			$tiposervicio=$_POST['tipo'];
			$destino=$_POST['dest'];
			$importe=$_POST['importe'];
			$importeext=$_POST['importeext2'];
			if($tiposervicio==4 || $tiposervicio==5){
				$estatus=5;
			}else{$estatus=1;}
			date_default_timezone_set('UTC');
			date_default_timezone_set("America/Mexico_City");	
			$f=date('Y-m-d');
			$h=date('H:i:s');
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr1'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idr=$row2['idpersonard'];
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr2'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idd=$row2['idpersonard'];
				$sql_insert=$conn->query("
				INSERT INTO servicio set
				idremitente=$idr, 
				iddestinatario=$idd, 
				cadenaservicio='xxxx', 
				fechas='$f', 
				horas='$h', 
				tamano=$tamano, 
				cantidad=$cantidad,
				peso=$peso, 
				ancho=$ancho, 
				largo=$largo, 
				alto=$alto,
				valor=$valor, 
				passwordresencion='$password', 
				ciudaddest=$idsucdest,
				acuserecibido=$acuse, 
				tipoenpaque=$tempaque, 
				contenido=$contenido, 
				descripcionenvio='$denvio', 
				descripcionentrega='$dentrega',
				direccionpo=$direccionpo,
				direccionent='$direccionent',
				tiposervicio=$tiposervicio,
				destino=$destino,
				importe=$importe,
				montoext=$importeext,
				estatus=$estatus,entregadest=7
				");
				if ($sql_insert) 
				{
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha guardado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha guardado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
		}
	}else{			
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Inserte todos los datos.
		</div>
		<?php
	}
}break;
case '45': {//REGRESAR A REPARTIDOR DESTINO(6)
	if(isset($_POST["id"]))
	{
			$id=$_POST["id"];
			$sql_insert=$conn->query("update servicio set 
			estatus=5		
			where
			idservicio=$id
			");
			
	 ?>
				<div class="alert alert-success">
				 <strong>Servicio movido a reparto</strong> <?php echo $id;?>
				</div>
			<?php
	}
}break;
case '46': {//DESEMPAQUETAR SERVICIO
	if (
	!empty($_POST['idserv'])	
	) 
	{
		if (isset($_POST['idserv'])) 
		{
			$idserv=($_POST['idserv']);
			echo $ids=($_POST['ids']);
			$sql_insert=$conn->query("delete from listaseguimiento where idservicio=$idserv");
			$sql_insert=$conn->query("
			update servicio set 
			estatus=1,
			idseguimiento=0 
			where idservicio=$idserv");
				if ($sql_insert) 
				{
					$consulta="select count(*) as cont from listaseguimiento
					where idseguimiento=".$ids;
					$r1=$conn->query($consulta);
					$row2=$r1->fetch_assoc();	
					echo $n=$row2['cont']; 
					if($n==0){
						$sql_insert=$conn->query("delete from seguimiento where idseguimiento=$ids");
					}
					?>
					<div class="alert alert-success">
						 <strong>Success!</strong> Se ha eliminado la información.
					</div>
					<?php
				}
				else
				{
					?>
					<div class="alert alert-danger">
						 <strong>Danger!</strong> No se ha eliminado la información. <?php echo $conn->error; ?>
					</div>
					<?php
				}
		}
	}else{
		?>
		<div class="alert alert-info" role="alert">
		  <strong>Warning!</strong> Faltan datos.
		</div>
		<?php
	}
}break;
}
?>