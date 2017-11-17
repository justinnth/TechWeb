<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 27/10/2017
 * Time: 10:30
 */

include "connexion.php";

$connectionBD = connectionBD();

$sql = "select * from typespectacle";
$result = $connectionBD->prepare($sql);
if ($result->execute()) {
    $types = $result->fetchAll();
}
else{
    $types = array();
}

$sql2 = "insert into spectacle (nom, compagnie, type, date, plusieursDate, description, photos, nomDossierPhotos) values (:nom, :compagnie, :type, :date, :plusieursDate, :description, :photos, :nomDossierPhotos)";
$result2 = $connectionBD->prepare($sql2);

$result2->bindParam(':nom', $nomSpectacle);
$result2->bindParam(':compagnie', $compagnie);
$result2->bindParam(':type', $type);
$result2->bindParam(':date', $date);
$result2->bindParam(':plusieursDate', $plusieursDate);
$result2->bindParam(':description', $description);
$result2->bindParam(':photos', $image);
$result2->bindParam(':nomDossierPhotos', $nomDossier);

if (isset($_POST['nom']) && isset($_POST['compagnie']) && isset($_POST['numType']) && isset($_POST['date']) && isset($_POST['plus']) && isset($_POST['description']) && isset($_FILES) && isset($_POST['dossier'])){
    $nomSpectacle = $_POST['nom'];
    $compagnie = $_POST['compagnie'];
    $type = $_POST['numType'];
    $date = $_POST['date'];
    $plusieursDate = $_POST['plus'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $nomDossier = $_POST['dossier'];
    if (!empty($nomSpectacle) && !empty($compagnie) && !empty($type) && !empty($plusieursDate) && !empty($description) && !empty($image) && !empty($nomDossier)){
        if($result2->execute()){
            $uploaddir = "photos/$nomDossier/";
            $uploadfile = $uploaddir.$image;
            if (mkdir($uploaddir))
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ajouter un spectacle</title>
</head>

<body>
<h1> Administration des spectacles</h1>

<form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Ajout d'un spectacle</legend>
        <p>
            <label for="nom" >Nom</label>
            <input type="text" id="nom" name="nom"/>
        </p>
        <p>
            <label for="comp" >Compagnie</label>
            <input type="text" id="comp" name="compagnie"/>
        </p>
        <p>
            <label for="numType" >Type</label>
            <select name="numType" id="numType">
                <?php foreach ($types as $type): ?>
                    <option value="<?= $type['idSpec'] ?>"><?= $type['type'] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="date" >Date</label>
            <input type="date" id="date" name="date"/>
        </p>
        <p>
            <label for="plus" >Plusieurs date ?</label>
            <select name="plus" id="plusieursDate">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </p>
        <p>
            <label for="desc" >Description</label>
            <textarea name="description" id="desc" cols="30" rows="10"></textarea>
        </p>
        <p>
            <label for="image" >Image</label>
            <input type="file" id="image" name="image" accept="image/jpeg"/>
        </p>
        <p>
            <label for="doss" >Nom dossier photo</label>
            <input type="text" id="doss" name="dossier"/>
        </p>
    </fieldset>

    <p><input type="submit" value="Envoyer" /></p>
</form>

</body>
</html>
