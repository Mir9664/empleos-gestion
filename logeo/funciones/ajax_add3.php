<?php
require '../seguridad/conn_mysqli.php';
require '../seguridad/seguridad.php';
$op=$_POST['dat_op'];
switch ($op) {
case '20': {//AGREGAR SERVICIO
	if (
	!empty($_POST['rfcr1'])&& 
	!empty($_POST['rfcr2'])&& 
	!empty($_POST['cantidad'])&&
	!empty($_POST['tempaque'])&&
	!empty($_POST['denvio'])&&
	!empty($_POST['direccionpo'])&&	
	!empty($_POST['idsucdest'])&& 
	!empty($_POST['tamano'])&& 
	!empty($_POST['tiposervicio'])&& 
	!empty($_POST['destino'])	
	) 
	{
		if (isset($_POST['rfcr1'])) 
		{
			$rfcr1=($_POST['rfcr1']);
			$rfcr2=($_POST['rfcr2']);
			$tamano=($_POST['tamano']);
			$idsucdest=($_POST['idsucdest']);
			$cantidad=($_POST['cantidad']);
			/*$peso=intval($_POST['peso']);
			$ancho=intval($_POST['ancho']);
			$largo=intval($_POST['largo']);
			$alto=intval($_POST['alto']);
			$valor=intval($_POST['valor']);
			$password=($_POST['password']);
			$acuse=($_POST['acuse']);*/
			$tempaque=($_POST['tempaque']);
			//$contenido=intval($_POST['contenido']);
			$dentrega=($_POST['dentrega']);
			$denvio=($_POST['denvio']);
			$direccionpo=($_POST['direccionpo']);
			$direccionent=($_POST['direccionent']);
			$tiposervicio=($_POST['tiposervicio']);
			$destino=($_POST['destino']);
			$importe=($_POST['importe']);
			$importeext=intval($_POST['importeext']);
			$pxm=intval($_POST['pxm']);
			$pxme=intval($_POST['pxme']);
			$mxcc=$_POST['mxcc'];
			$pxcc=intval($_POST['pxcc']);
			if($tiposervicio==4 || $tiposervicio==5){
				$estatus=5;
			}else{$estatus=1;}
			date_default_timezone_set('UTC');
			date_default_timezone_set("America/Mexico_City");	
			$f=date('Y-m-d');
			$h=date('H:i:s');
			$ua=trim($_SESSION["usuarioactual"]);
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr1'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idr=$row2['idpersonard'];
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr2'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idd=$row2['idpersonard'];
				$consulta="SELECT * FROM sucursales where idsuc=$suc";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$claves=trim($row2['claves']);
				$consulta="SELECT * FROM personal where rfcp='$ua'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$nombrep=trim($row2['nombrep']);
				$consulta="SELECT count(*) as ns FROM servicio";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$ns=$row2['ns']+1;
				$f2=str_replace("-", "", $f);				
				$usu=trim(substr($ua, 0, 4));//iniciales de usuario
				$numse=$claves.$usu.$f2.$tiposervicio.$ns;
				$sql_insert=$conn->query("
				INSERT INTO servicio set
				idremitente=$idr, iddestinatario=$idd, 
				cadenaservicio='$numse', fechas='$f', 
				horas='$h', tamano=$tamano, capturo='$nombrep',
				cantidad=$cantidad,
				ciudaddest=$idsucdest,
				tipoenpaque=$tempaque, 
				descripcionenvio='$denvio', 
				descripcionentrega='$dentrega',direccionpo=$direccionpo,
				direccionent='$direccionent',tiposervicio=$tiposervicio,
				destino=$destino,importe=$importe,montoext=$importeext,estatus=$estatus,
				pagximporte=$pxm, pagxmextra=$pxme, 
				pagcobxcompra=$pxcc,montoxcompra=$mxcc,				
				entregadest=7,idsuc=$suc
				");
				if ($sql_insert) 
				{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = "La informacion se guardo con exito";
					$respuestaValidacion["band"] = true;
					$respuestaValidacion["ns"] = $numse;
					$respuestaValidacion["fe"] = $f;
					$respuestaValidacion["ho"] = $h;
					$respuestaValidacion["capturo"] = $nombrep;
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
				}
				else
				{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = "La informacion no se guardo con exito: ".$conn->error;
					$respuestaValidacion["band"] = false;
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
				}
		}
	}else{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = "Inserte los datos de manera correcta";
					$respuestaValidacion["band"] = false;
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
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
	!empty($_POST['tempaque'])&&		
	!empty($_POST['direccionpo'])&&
	!empty($_POST['tamano'])&&
	!empty($_POST['tipo'])&&
	!empty($_POST['dest'])&&	
	!empty($_POST['midsucdest'])
	) 
	{
		if (isset($_POST['rfcr1'])) 
		{
			$idserv=($_POST['idserv']);
			$rfcr1=($_POST['rfcr1']);
			$rfcr2=($_POST['rfcr2']);
			$tamano=($_POST['tamano']);
			$tipo=($_POST['tipo']);
			$cantidad=($_POST['cantidad']);
			/*$peso=intval($_POST['peso']);
			$ancho=intval($_POST['ancho']);
			$largo=intval($_POST['largo']);
			$alto=intval($_POST['alto']);
			$valor=($_POST['valor']);
			$password=($_POST['password']);
			$acuse=($_POST['acuse']);*/
			$tempaque=($_POST['tempaque']);
			//$contenido=intval($_POST['contenido']);
			$dentrega=($_POST['dentrega']);
			$denvio=($_POST['denvio']);
			$direccionpo=($_POST['direccionpo']);
			$direccionent=($_POST['direccionpodesc']);
			$tipo=($_POST['tipo']);
			$dest=($_POST['dest']);
			$importe=($_POST['importe']);
			$midsucdest=($_POST['midsucdest']);
			$importeext=intval($_POST['montoext']);
			$adeudos=($_POST['adeudoss']);
			$pxm=intval($_POST['pxm']);
			$pxme=intval($_POST['pxme']);
			$mxcc=$_POST['mxcc'];
			$pxcc=intval($_POST['pxcc']);
			date_default_timezone_set('UTC');
			date_default_timezone_set("America/Mexico_City");	
			$f=date('Y-m-d');
			$h=date('H:i:s');
			$ua=trim($_SESSION["usuarioactual"]);
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr1'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idr=$row2['idpersonard'];
				$consulta="SELECT idpersonard FROM remitentedestinatario where rfcrd='$rfcr2'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$idd=$row2['idpersonard'];	
				$consulta="SELECT * FROM personal where rfcp='$ua'";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$nombrep=trim($row2['nombrep']);
						
				$consulta="SELECT * FROM sucursales where idsuc=$suc";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$claves=trim($row2['claves']);
				$consulta="SELECT count(*) as ns FROM servicio";
						$recordset=$conn->query($consulta);
						$row2=$recordset->fetch_assoc();	
						$ns=$row2['ns'];
				$f2=str_replace("-", "", $f);				
				$usu=trim(substr($ua, 0, 4));//iniciales de usuario
				$numse=$claves.$usu.$f2.$tipo.$ns;
			
				$sql_insert=$conn->query("
				update servicio set
				idremitente=$idr, iddestinatario=$idd, 
				fechas='$f',horas='$h', tamano=$tamano, 
				cantidad=$cantidad,ciudaddest=$midsucdest, 
				tipoenpaque=$tempaque, 
				descripcionenvio='$denvio', 
				descripcionentrega='$dentrega',direccionpo=$direccionpo,
				direccionent='$direccionent',tiposervicio=$tipo,
				destino=$dest,importe=$importe,montoext=$importeext,
				adeudos=$adeudos,
				pagximporte=$pxm, pagxmextra=$pxme, 
				pagcobxcompra=$pxcc,montoxcompra=$mxcc
				where idservicio=$idserv
				");
				if ($sql_insert) 
				{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = "La informacion se guardo con exito";
					$respuestaValidacion["band"] = true;
					$respuestaValidacion["ns"] = $numse;
					$respuestaValidacion["fe"] = $f;
					$respuestaValidacion["ho"] = $h;
					$respuestaValidacion["capturo"] = $nombrep;
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
				}
				else
				{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = "La informacion no se guardo con exito: ".$conn->error;
					$respuestaValidacion["band"] = false;
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
				}
		}
	}else{
					$respuestaValidacion = array();
					$respuestaValidacion["respuesta"] = "Inserte los datos de manera correcta";
					$respuestaValidacion["band"] = false;
					$respuesta = json_encode($respuestaValidacion);
					echo $respuesta;
	}
}break;
}
?>