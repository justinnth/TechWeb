<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 27/10/2017
 * Time: 11:43
 */

include "connexion.php";

$connectionBD = connectionBD();

if (isset($_GET['type'])){
    $type = $_GET['type'];
    if (!empty($type)){
        $sql = "select nom, date from spectacle where type = $type";
    }
}
else{
    header("Location:index.php");
}

$result = $connectionBD->prepare($sql);

if ($result->execute()){
    $spectacles = $result->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $spectacles = array();
}

$sortieJson = json_encode($spectacles);

print($sortieJson);