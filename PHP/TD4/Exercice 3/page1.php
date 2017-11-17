<?php

session_start();

if(isset($_COOKIE['personne'])){
    $nom = $_COOKIE['personne']['nom'];
    $prenom = $_COOKIE['personne']['prenom'];
    $age = $_COOKIE['personne']['age'];
    $succes = "Bonjour $prenom $nom, vous avez $age ans";
}
else{
    $erreur = "Bonjour ... Aucun cookie";
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TD4</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
    <p>
        <?php 
        if(isset($_COOKIE['personne']))
            echo $succes;
        else
            echo $erreur;
        ?>
    </p>
</body>
</html>