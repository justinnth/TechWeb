<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 18/10/2017
 * Time: 08:17
 */

include "Personne.php";
require "connexion.php";

$connexion = connectionBD();

$sql = "SELECT * FROM Personne";

$ret=$connexion->query($sql);
$ret->setFetchMode(PDO::FETCH_CLASS,'Personne');
$obj = $ret->fetch();

var_dump($obj);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TD6 - Classe PHP</title>
</head>
<body>
<h1>Hola Que Tal</h1>
</body>
</html>
