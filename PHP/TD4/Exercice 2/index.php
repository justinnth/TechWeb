<?php

session_start();

$_SESSION['nom'] = 'North';
$_SESSION['prenom'] = 'Justin';
$_SESSION['age'] = 19;

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TD4 - Exercice 2</title>
</head>
<body>
  <a href="page1.php">Lien vers la page1.php</a>
</body>
</html>