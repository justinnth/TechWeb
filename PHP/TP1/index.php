<?php

include "srilanka.php";
include "fonctions.php";

//EXO 1-1

$adresse = "abourmau@univ-lr.fr";
$explode = explode("@", $adresse);

$user = $explode[0];
$server = $explode[1];

//EXO 1-2

$clients = array(
    array("Leparc","paris",35),
    array("Durox","Bordeaux",22),
    array("Dupont","Nantes",27)
);

//EXO 1-3

$departements = array(
    "17"=>"Charente-maritime",
    "16"=>"Charente",
    "86"=>"Vienne",
    "75"=>"Ile de france"
);

$departements["33"] = "Gironde";

ksort($departements);

//EXO 1-4

$villes = array();
foreach($srilanka as $key => $value){
    $villes[] = $key;
}

//Problème

$dir = "galeries";
$gallery = array();
if(is_dir($dir)){
    $tab1 = scandir($dir);
    foreach($tab1 as $key){
        if(($key !== ".") && ($key !== "..")){
            $gallery[$key] = array();
            if(is_dir($dir."/".$key)){
                $tab2 = scandir($dir."/".$key);
                foreach($tab2 as $value){
                    if(($value !== ".") && ($value !== "..") && ($value !== "thumb")){
                        if(is_dir($dir."/".$key."/".$value)){
                            $tab3 = scandir($dir."/".$key."/".$value);
                            foreach($tab3 as $image){
                                if(($image !== ".") && ($image !== "..") && ($image !== "thumb"))
                                    $gallery[$key][] = $image;
                            }
                        }
                    }
                }
            }
        }
    }
}


?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title></title>

        <style type="text/css">
            table{  border : 1px solid black;  
                border-collapse :collapse; 
            }
            td,th {border : 1px solid black; }
        </style>

    </head>
    <body >
        <h2>Exercice 1-1 </h2>
        <p>l'utilisateur est <?= $user ?> et son serveur mail est <?= $server ?></p>

        <h2>Exercice 1-2</h2>

        <table>
            <tr>
            <th>Numero</th>
            <th>Nom</th> 
            <th>Ville</th>
            <th>Age</th>
            </tr>

            <?php for($i = 0; $i < sizeof($clients); $i++): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $clients[$i][0] ?></td>
                    <td><?= $clients[$i][1] ?></td>
                    <td><?= $clients[$i][2] ?></td>
                </tr>
            <?php endfor; ?>

        </table>

        <h2>Exercice 1-3 : Tableau associatif</h2>
        <?php foreach($departements as $key => $departement): ?>
            <p>Le numéro de département de la <?= $departement ?> est <?= $key ?></p>
        <?php endforeach; ?>

        


        <h2>Exercice 1-4 : Tableau associatif</h2>
        <?= print_r($srilanka) ?>
        <h3>Villes du Sri Lanka</h3>
        <ul>
            <?php foreach($villes as $ville): ?>
                <li><?= $ville ?>
            <?php endforeach; ?>
        </ul>

        <h3>Caractéristiques des villes du Sri Lanka</h3>
        <ul>
            <?php foreach($srilanka as $key => $caracteristiques): ?>
                <li><?= $key ?>
                <ul>
                    <?php foreach($caracteristiques as $key2 => $value): ?>
                        <li><?= $key2 ?> : <?= $value ?></li>
                    <?php endforeach; ?>
                </ul>
                </li>
            <?php endforeach; ?>
        </ul>

        <p>La moyenne de la population de ces villes est de  <?= moyenne($srilanka) ?></p>


        <h2>Exercice 5 : Mensualités</h2>        
        <p>Simulation 1 : <?= calcMensualite(200000, 5.15/100, 15, 0.36/100) ?></p>
        <p>Simulation 2 : <?= calcMensualite(200000, 5.30/100, 25, 0.36/100) ?></p>


        <h2> Galeries photos </h2>      

        <?php foreach($gallery as $key => $value): ?>
            <h2><?= $key ?></h2>
            <?php foreach($value as $image): ?>
                <a data-fancybox="gallery" href="galeries/<?= $key ?>/images/<?= $image ?>"><img src="galeries/<?= $key ?>/thumb/<?= $image ?>"></a>
            <?php endforeach; ?>
        <?php endforeach; ?>

        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>

        </body>
        </html>
