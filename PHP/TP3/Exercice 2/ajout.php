<?php

include "connexion.php";

$connectionBD = connectionBD();

if(isset($_POST) || !empty($_POST)){
    if(!empty($_POST['ville']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['population'])){
        $ville = $_POST['ville'];
        $lat = (float) $_POST['latitude'];
        $lon = (float) $_POST['longitude'];
        $pop = (int) $_POST['population'];
        $nomImage = "imgSriLanka/".$_FILES['image']['name'];

        $sql = "insert into srilanka (ville, latitude, longitude, population, image) values ('$ville', $lat, $lon, $pop, '$nomImage')";

        $rep = $connectionBD->query($sql);

        header("Location:index.php");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajouter des données dans le tableau du sri lanka</title>
    </head>

    <body>
        <?php if(!isset($_POST['send'])): ?>
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
        <?php endif; ?>
    </body>
</html>