<?php 
	require '../seguridad/conn_mysqli.php';
	require '../seguridad/seguridad.php';

	if (isset($_POST['data_idd']) || isset($_POST['data_ins']) || isset($_POST['data_dep']) || isset($_POST['data_dom']) || isset($_POST['data_url']) || isset($_POST['data_cla']) || isset($_POST['data_ciu']) || isset($_POST['data_rf1']) || isset($_POST['data_dir']) || isset($_POST['data_rf2']) || isset($_POST['data_con']) || isset($_POST['data_rf3']) || isset($_POST['data_caj']) || isset($_POST['data_rf4']) || isset($_POST['data_dig'])) 
	{
		$dat_idd=$_POST['data_idd'];$dat_ins=$_POST['data_ins'];$dat_dep=$_POST['data_dep'];$dat_dom=$_POST['data_dom'];$dat_url=$_POST['data_url'];$dat_cla=$_POST['data_cla'];$dat_ciu=$_POST['data_ciu'];$dat_rf1=$_POST['data_rf1'];$dat_dir=$_POST['data_dir'];$dat_rf2=$_POST['data_rf2'];$dat_con=$_POST['data_con'];$dat_rf3=$_POST['data_rf3'];$dat_caj=$_POST['data_caj'];$dat_rf4=$_POST['data_rf4'];$dat_dig=$_POST['data_dig'];

		$insert_query=$conn->query("INSERT INTO tbls_institucion(dependencia,departamento,domicilio,clave,ciudad,rfc_d,director,rfc_c,contralor,rfc_ca,cajero,rfc_dg,directorg,url)VALUES('$dat_ins','$dat_dep','$dat_dom','$dat_cla','$dat_ciu','$dat_rf1','$dat_dir','$dat_rf2','$dat_con','$dat_rf3','$dat_caj','$dat_rf4','$dat_dig','$dat_url')");
		if ($insert_query)
		{
			?>
			<div class="alert alert-success">
				<i class="fa fa-check"></i> Se Ha Guardado La Información
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				Ha Ocurrido Un Error... <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
	if (isset($_POST['dat_idd']) || isset($_POST['dat_ins']) || isset($_POST['dat_dep']) || isset($_POST['dat_dom']) || isset($_POST['dat_url']) || isset($_POST['dat_cla']) || isset($_POST['dat_ciu']) || isset($_POST['dat_rf1']) || isset($_POST['dat_dir']) || isset($_POST['dat_rf2']) || isset($_POST['dat_con']) || isset($_POST['dat_rf3']) || isset($_POST['dat_caj']) || isset($_POST['dat_rf4']) || isset($_POST['dat_dig'])) 
	{
		$dat_idd=$_POST['dat_idd'];/*ID*/$dat_ins=$_POST['dat_ins'];/*DEPENDE*/$dat_dep=$_POST['dat_dep'];/*DEPARta*/$dat_dom=$_POST['dat_dom'];$dat_url=$_POST['dat_url'];$dat_cla=$_POST['dat_cla'];$dat_ciu=$_POST['dat_ciu'];$dat_rf1=$_POST['dat_rf1'];$dat_dir=$_POST['dat_dir'];$dat_rf2=$_POST['dat_rf2'];$dat_con=$_POST['dat_con'];$dat_rf3=$_POST['dat_rf3'];$dat_caj=$_POST['dat_caj'];$dat_rf4=$_POST['dat_rf4'];$dat_dig=$_POST['dat_dig'];

		$update_query=$conn->query("UPDATE tbls_institucion SET dependencia='".$dat_ins."',departamento='".$dat_dep."',domicilio='".$dat_dom."',clave='".$dat_cla."',ciudad='".$dat_ciu."',rfc_d='".$dat_rf1."',director='".$dat_dir."',rfc_c='".$dat_rf2."',contralor='".$dat_con."',rfc_ca='".$dat_rf3."',cajero='".$dat_caj."',rfc_dg='".$dat_rf4."',directorg='".$dat_dig."',url='".$dat_url."' WHERE id_instituto='".$dat_idd."'");
		if ($update_query)
		{
			?>
			<div class="alert alert-success">
				<i class="fa fa-check"></i> Se Ha Actualizado La Información
			</div>
			<?php
		}
		else
		{
			?>
			<div class="alert alert-warning">
				Ha Ocurrido Un Error... <?php echo $conn->error; ?>
			</div>
			<?php
		}
	}
	if (isset($_FILES["file"]))
	{
	    $file = $_FILES["file"];
	    $nombre = $file["name"];
	    $tipo = $file["type"];
	    $ruta_provisional = $file["tmp_name"];
	    $size = $file["size"];
	    $dimensiones = getimagesize($ruta_provisional);
	    $width = $dimensiones[0];
	    $height = $dimensiones[1];
	    $carpeta = "../images/";
	    
	    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
	    {
	      echo "<label style='color:red'>Error, el archivo no es una imagen</label>";
	    }
	    else if ($size > 1024*1024)
	    {
	      echo "<label style='color:red'>Error, el tamaño máximo permitido es un 1MB</label>";
	    }
	    else if ($width > 500 || $height > 500)
	    {
	        echo "<label style='color:red'>Error la anchura y la altura maxima permitida es 500px</label>";
	    }
	    else if($width < 60 || $height < 60)
	    {
	        echo "<label style='color:red'>Error la anchura y la altura mínima permitida es 60px</label>";
	    }
	    else
	    {
	        $src = $carpeta.$nombre;
	        move_uploaded_file($ruta_provisional, $src);
	        //echo "<img src='$src'>";
	        mysql_query("UPDATE tbls_institucion SET logo='".$nombre."' WHERE id_instituto='1'");
	    }
	}
?>