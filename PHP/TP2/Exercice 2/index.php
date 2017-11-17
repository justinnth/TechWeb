<?php

include "srilanka.php";
include "fonctions.php";

if(isset($_POST['send'])){
    if(!empty($_POST['ville']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['population'])){
        $ville = $_POST['ville'];
        $lat = (float) $_POST['latitude'];
        $lon = (float) $_POST['longitude'];
        $pop = (int) $_POST['population'];
        $nomImage = "imgSriLanka/".$_FILES['image']['name'];
    
        $tableauCaracteristiques = array(
            "lat"=>$lat,
            "long"=>$lon,
            "pop"=>$pop,
            "image"=>$nomImage
        );
    
        $srilanka[$ville] = $tableauCaracteristiques;
    }
}

$villes = array();
foreach($srilanka as $key => $value){
    $villes[] = $key;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter des données dans le tableau du sri lanka</title>
    </head>

    <body>
        <form id="formulaire" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <legend>Ajout de données à sri lanka</legend>
                <p>
                    <label for="nom" >Ville</label>
                    <input type="text" id="nom" name="ville"/>
                </p>
                <p>
                    <label for="lat" >Latitude</label>
                    <input type="number" id="lat" name="latitude" step="any"/>
                </p>
                <p>
                    <label for="lon" >Longitude</label>
                    <input type="number" id="lon" name="longitude" step="any"/>
                </p>
                <p>
                    <label for="pop" >Population</label>
                    <input type="number" id="pop" name="population"/>
                </p>
                <p>
                    <label for="image" >Image</label>
                    <input type="file" id="image" name="image" accept="image/jpeg"/>
                </p>
                <p class="submit">
                    <label>Clic</label>
                    <input type="submit" value="Envoi" name="send" />    
                </p>
            </fieldset>
        </form>

        <h3>Villes du Sri Lanka</h3>
        <ul>
            <?php foreach($villes as $ville): ?>
                <li><?= $ville ?>
            <?php endforeach; ?>
        </ul>

        <h3>Caractéristiques des villes du Sri Lanka</h3>
        <ul>
            <?php foreach($srilanka as $key => $caracteristiques): ?>
                <li><?= $key ?>
                <ul>
                    <?php foreach($caracteristiques as $key2 => $value): ?>
                        <li><?= $key2 ?> : <?= $value ?></li>
                    <?php endforeach; ?>
                </ul>
                </li>
            <?php endforeach; ?>
        </ul>

        <p>La dsitance totale entre ces villes est d'environ  <?= distance($srilanka) ?> km</p>


    </body>
</html>