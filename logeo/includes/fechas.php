<?php
	function FinMesActual($mesSel) //01-01-2000
    {   
        return date("d",(mktime(0,0,0,$mesSel+1,1,date('Y'))-1))."-".date($mesSel)."-".date('Y');
    }
    function FinMesActuallllllll($mesSel)
    {   
        return date('Y')."-".date($mesSel)."-".date("d",(mktime(0,0,0,$mesSel+1,1,date('Y'))-1));
    }
    function FinMesActual10() //01-01-2000
    {   
        $fecha=new DateTime();
        $fecha->modify('last day of this month');
        return $fecha->format('d');
    }
	function FinMesActual2()	//2000-01-01
	{	
		$fecha=new DateTime();
		$fecha->modify('last day of this month');
		return $fecha->format('Y-m-d');
	}
	function IniMesActual()
    {   
        $fecha=new DateTime();
        $fecha->modify('first day of this month');
        return $fecha->format('Y-m-d');
    }
    function IniMesActual3($mesSel)
    {   
        return date('d-m-Y', mktime(0,0,0, $mesSel, 1, date('Y')));
    }
    function IniMesActualUltimo($mesSel)
    {
        return date('Y')."-".date($mesSel)."-".date("d",(mktime(0,0,0,$mesSel+1,1,date('Y'))-1));
    }
    function FinMesActual5($mesSel)
    {
        return date("d",(mktime(0,0,0,$mesSel+1,1,date('Y'))-1));
    }
    function FinMesActual6($mesSel)
    {
	    $dias = array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
    	$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
    	return $meses[date($mesSel)-1]."-".date('Y');
    }
	function FechaActual() //01-Enero-2000
    {
        $dias = array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        return date('d')."-".$meses[date('n')-1]."-".date('Y');
    }
    function FechaActual2($mesSel)   //01-Enero-2000
    {
        $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
        return $meses[date($mesSel)-1];
    }
    function FechaMesActual()   //2000-01-01
    {
        return date('Y-m-d');
    }
	function MesActual($mesSel)	//Enero de 2000
	{
		$dias = array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
    	$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
    	return $meses[date($mesSel)-1]." DE ".date('Y');
	}
	function DiaFechaCompleta()	//Lunes, 01 de Enero de 2000
	{
		$dias = array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
    	$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
		return $dias[date('w')].", ".date('d')." DE ".$meses[date('n')-1]." DE ".date('Y');
	}
?>