<?php 

include "connexion.php";

$connectionBD = connectionBD();

if(isset($_GET['id'])){
    $idVille = $_GET['id'];
    setcookie("villes[$idVille]","$idVille");
}
else{
    header("Location:index.php");
}

$sql = "select ville, latitude, longitude, population, image from srilanka where id_ville=$idVille";

//Envoi de la requête
$rep = $connectionBD->query($sql);

$return = $rep->fetchAll(PDO::FETCH_ASSOC);

$listeCaractéristiques = $return[0];

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Détail de la ville</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Le reste du contenu -->
    <div class="grid-container">
        <div class="row">
            <h1 class="titre">Caractéristiques de la ville de <?= $listeCaractéristiques['ville'] ?></h1>
        </div>

        <hr>

        <div class="row">
            <img src="<?= $listeCaractéristiques['image'] ?>" alt="<?= $idVille ?>">
            <ul>
                <li>Latitude : <?= $listeCaractéristiques['latitude'] ?></li>
                <li>Longitude : <?= $listeCaractéristiques['longitude'] ?></li>
                <li>Population : <?= $listeCaractéristiques['population'] ?></li>
            </ul>
        </div>

        <div class="row text-center">
            <h1>WOW</h1>
        </div>
    </div>

</body>
</html>