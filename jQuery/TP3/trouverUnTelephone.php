<?php

include "connectionBD.php";

$connection = connectionBD();

$result = $connection->prepare("SELECT * FROM telephones ORDER BY rand() LIMIT 1");

if ($result->execute()) {
    $telephone = $result->fetch(PDO::FETCH_ASSOC);
    $telephone = json_encode($telephone);
}

echo $telephone;