<?php

include "connectionBD.php";

$connection = connectionBD();

if(isset($_GET['n'])){
    if(!empty($_GET['n'])){
        $n = $_GET['n'];
        $sql = "SELECT photo FROM telephones WHERE num = $n";
        $result = $connection->prepare($sql);
    }
}
else{
    header("Location:index.html");
}

if ($result->execute()) {
    $photoTel = $result->fetch(PDO::FETCH_ASSOC);
    $photoTel = $photoTel['photo'];
}
echo $photoTel;