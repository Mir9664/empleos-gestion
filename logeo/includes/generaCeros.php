<?php
    function generaCeros($nFo)
    {
        $largo_numero = strlen($nFo);
        $largo_maximo = 4;
        $agregar = $largo_maximo - $largo_numero;
        for($i = 0; $i < $agregar; $i++)
        {
            $nFo="0" . $nFo;
        }
        return $nFo;
    }
    function generaCeros2($nFo)
    {
        $largo_numero = strlen($nFo);
        $largo_maximo = 5;
        $agregar = $largo_maximo - $largo_numero;
        for($i = 0; $i < $agregar; $i++)
        {
            $nFo="0" . $nFo;
        }
        return $nFo;
    }
    function generaCeros3($nFo)
    {
        $largo_numero = strlen($nFo);
        $largo_maximo = 3;
        $agregar = $largo_maximo - $largo_numero;
        for($i = 0; $i < $agregar; $i++)
        {
            $nFo="0" . $nFo;
        }
        return $nFo;
    }
    function generaCerosUno($nFo)
    {
        $largo_numero = strlen($nFo);
        $largo_maximo = 2;
        $agregar = $largo_maximo - $largo_numero;
        for($i = 0; $i < $agregar; $i++)
        {
            $nFo="0" . $nFo;
        }
        return $nFo;
    }
    function recortar_texto($texto, $limite=100)
    {
        $texto = trim($texto);
        $texto = strip_tags($texto);
        $tamano = strlen($texto);
        $resultado = '';
        if($tamano <= $limite){
            return $texto;
        }else{
            $texto = substr($texto, 0, $limite);
            $palabras = explode(' ', $texto);
            $resultado = implode(' ', $palabras);
            $resultado .= '...';
        }   
        return $resultado;
    }
?>