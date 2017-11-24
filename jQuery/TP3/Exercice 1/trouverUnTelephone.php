<?php

include "connectionBD.php";

session_start();

if($_SESSION['numTel'] == 4)
    $_SESSION['numTel'] = 1;
else
    $_SESSION['numTel']++;

setcookie("numTel", $_SESSION['numTel']);

$connection = connectionBD();

$result = $connection->prepare("SELECT * FROM telephones WHERE num = ".$_SESSION['numTel']);

if ($result->execute()) {
    $telephone = $result->fetch(PDO::FETCH_ASSOC);
    $telephone = json_encode($telephone);
}

echo $telephone;