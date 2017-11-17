<?php

include "connexion.php";

$connectionBD = connectionBD();

$sql = "select * from srilanka";

//Envoi de la requête
$rep = $connectionBD->query($sql);

$listeVilles = $rep->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
	<title>Exercice 2 - TP3</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="grid-container outline">
        <div class="row">
            <h1 class="titre">Caractéristiques des villes du Sri Lanka</h1>
        </div>

        <hr>

        <div class="row">
        <?php foreach($listeVilles as $ville): ?>
            <div class="col-6">
            <h3><?= $ville['ville'] ?></h3>
                <ul>
                    <li>Latitude : <?= $ville['latitude'] ?></li>
                    <li>Longitude : <?= $ville['longitude'] ?></li>
                    <li>Population : <?= $ville['population'] ?></li>
                    <li><img src="<?= $ville['image'] ?>" alt="<?= $ville['id_ville'] ?>"></li>
                </ul>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</body>
</html>