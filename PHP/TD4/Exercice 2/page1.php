<?php

session_start();

if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['age'])){
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $age = $_SESSION['age'];
    $succes = "Bonjour $prenom $nom, vous avez $age ans";
}
else{
    $erreur = "Bonjour ... Aucune session";
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
    <?php if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['age'])): ?>
        <p><?= $succes ?></p>
    <?php else: ?>
        <p><?= $erreur ?></p>
    <?php endif; ?>
</body>
</html>