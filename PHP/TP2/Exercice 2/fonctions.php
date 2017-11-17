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

function distance($tabSriLanka){
    $distance = 0;

    $rayonTerre = 6347;

    $tabLatitutesRad = array();
    $tabLongitutesRad = array();

    foreach($tabSriLanka as $ville => $caractéristiques){
        foreach($caractéristiques as $key => $value){
            if($key == "lat")
                $tabLatitutesRad[] = deg2rad($value);
            elseif($key == "lon")
                $tabLongitutesRad[] = deg2rad($value);
        }
    }

    for($i = 0; $i < 2; $i++){
        $distance += $rayonTerre * acos(sin($tabLatitutesRad[$i])*sin($tabLatitutesRad[$i+1]) + cos($tabLatitutesRad[$i])*cos($tabLatitutesRad[$i+1])*cos($tabLongitutesRad[$i]-$tabLongitutesRad[$i+1]));
    }

    return round($distance);
}

?>