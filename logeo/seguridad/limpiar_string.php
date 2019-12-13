function limpiar_string($campo){
    $campo=trim($campo);
    $campo=stripcslashes($campo);
    $campo=htmlspecialchars($campo);
    return $campo;
}