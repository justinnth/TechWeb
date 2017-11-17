<?php

function moyenne($tabSriLanka){
    $moyennePop = 0;
    foreach($tabSriLanka as $ville => $caractéristiques){
        foreach($caractéristiques as $key => $value){
            if($key == "pop")
                $moyennePop += $value;
        }
    }
    $moyennePop /= sizeof($tabSriLanka);
    return $moyennePop;
}

function calcMensualite($capital, $tauxAnnuel, $duree, $tauxAssurance){
    $nbMois = $duree*12;

    $tauxMensuel = $tauxAnnuel/12;
    $tauxAssuranceMensuel = $tauxAssurance/12;

    $base = 1 + $tauxMensuel;
    $puissance = -$nbMois;

    $coutAssurance = $capital*$tauxAssuranceMensuel;

    $mensualite = ($capital*$tauxMensuel)/(1- pow($base, $puissance))+$coutAssurance;

    return round($mensualite);
}

?>