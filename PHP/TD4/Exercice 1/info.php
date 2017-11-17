<?php

$produit = 23;
$prix = 120;

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TD4 - Exercice 1</title>
</head>
<body>
  <a href="test.php?produit=<?= $produit ?>&prix=<?= $prix ?>">Lien vers la page test</a>
</body>
</html>