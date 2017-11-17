<?php

include "connexion.php";

$connectionBD = connectionBD();

$sql = "select * from sujets";
$result = $connectionBD->prepare($sql);
if ($result->execute()) {
    $sujets = $result->fetchAll();
}

if (isset($_GET['description']) && isset($_GET['url']) && isset($_GET['numSujet']) && isset($_FILES)){
    $description = $_GET['description'];
    $url = $_GET['url'];
    $numSujet = $_GET['numSujet'];
    $image = $_FILES['image']['name'];
    echo "mdr";
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
	<title>Formulaire</title>
</head>

<body>
<h1> Administration des projets</h1>

<form>
    <fieldset>
        <legend>Ajout d'un projet</legend>
        <p>
            <label for="description" >Description</label>
            <input type="text" id="description" name="description"/>
        </p>
        <p>
            <label for="url" >Url</label>
            <input type="text" id="url" name="url"/>
        </p>
        <p>
            <label for="image" >Image</label>
            <input type="file" id="image" name="image" accept="image/jpeg"/>
        </p>
        <p>
            <label for="numSujet" >NumSujet</label>
            <select name="numSujet" id="numSujet">
                <?php foreach ($sujets as $sujet): ?>
                <option value="<?= $sujet['id'] ?>"><?= $sujet['nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
    </fieldset>

	<p><input type="submit" value="Envoyer" /></p>
</form>

</body>
</html>