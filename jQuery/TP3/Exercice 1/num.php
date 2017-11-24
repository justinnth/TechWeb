<?php

include "connectionBD.php";

$connection = connectionBD();

$result = $connection->prepare("SELECT count(num) as nbPhones FROM telephones");

if ($result->execute()) {
    $nbPhones = $result->fetch(PDO::FETCH_ASSOC);
    $nbPhones = $nbPhones['nbPhones'];
}

$nbRand = rand(1, $nbPhones);
echo $nbRand;