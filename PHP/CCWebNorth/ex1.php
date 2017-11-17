<?php

$appareilPhoto = array(
    "appareil 1"=>array(
        "nom"=>"Compact Canon PowerShot G7X Mark II",
        "prix"=>599
    ),
    "appareil 2"=>array(
        "nom"=>"Appareil photo compact Canon PowerShot G5X",
        "prix"=>729
    ),
    "appareil 3"=>array(
        "nom"=>"Compact Panasonic Lumix DMC-TZ101",
        "prix"=>610
    )
);

$nbAppareil = 0;
foreach ($appareilPhoto as $appareil){
    if ($appareil['prix'] >= 600){
        $nbAppareil++;
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Untitled Document</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>

<body>
<!--Affichage -->
<?php foreach ($appareilPhoto as $appareil => $caracteristiques): ?>
<p><?= $appareil ?> : <?= $caracteristiques['nom'] ?> ====> <?= $caracteristiques['prix']?></p>
<?php endforeach; ?>

<!--Nombre d'appareil superieur à 600€ -->
<p>Il y a <?= $nbAppareil ?> appareil(s) photo(s) à plus de 600€</p>
</body>
</html>
