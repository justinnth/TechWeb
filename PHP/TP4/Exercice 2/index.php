<?php

include "connexion.php";

$connectionBD = connectionBD();

$sql = "select id_ville, ville from srilanka";

//Envoi de la requête
$rep = $connectionBD->query($sql);

$listeVilles = $rep->fetchAll(PDO::FETCH_ASSOC);

if(isset($_COOKIE["villes"])){
    $villes = array();
    foreach($_COOKIE['villes'] as $idVille){
        $sql2 = "select * from srilanka where id_ville=$idVille";

        //Envoi de la requête
        $rep2 = $connectionBD->query($sql2);
        
        $listeCaractéristiques = $rep2->fetch(PDO::FETCH_ASSOC);

        $villes[] = $listeCaractéristiques;
    }
}
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
	<title>Exercice 2 - TP3</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="grid-container">
        <div class="row">
            <h1 class="titre">Villes du Sri Lanka</h1>
        </div>

        <hr>

        <div class="row">
            <div class="col-1"></div>
        <?php foreach($listeVilles as $ville): ?>
            <div class="col-2 text-center">
            <h3><a href="detail.php?id=<?= $ville['id_ville'] ?>"><?= $ville['ville'] ?></a></h3>
            </div>
        <?php endforeach; ?>
        <div class="col-1"></div>
        </div>

        <?php if(isset($_COOKIE['villes'])): ?>
        <hr>

        <div class="row">
            <h1 class="titre">Caractéristiques des villes visitées</h1>
        </div>
        
        <hr>

        <?php foreach($villes as $ville): ?>
        <div class="row">
            <h3><?= $ville['ville'] ?></h3>
            <ul>
                <li>Latitude : <?= $ville['latitude'] ?></li>
                <li>Longitude : <?= $ville['longitude'] ?></li>
                <li>Population : <?= $ville['population'] ?></li>
                <li><img src="<?= $ville['image'] ?>" alt="<?= $ville['id_ville'] ?>"></li>
            </ul>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>