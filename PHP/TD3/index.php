<?php

include "connexion.php";
$connectionBD = connectionBD();

$sql = "select * from contacts";
$sql2 = "select * from contacts where ville=\"La Rochelle\"";

//Envoi de la requête
$rep = $connectionBD->query($sql);
$rep2 = $connectionBD->query($sql2);

$listeContacts = $rep->fetchAll(PDO::FETCH_ASSOC);
$listeContactsLR = $rep2->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TD3</title>
</head>
<body>
    ...
    <!-- Le reste du contenu -->
    <h2>Mes contacts</h2>
    <p>Requete : <?= $sql ?></p>

    <table border="1px">
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>adresse</th>
            <th>code Postal</th>
            <th>Ville</th>
            <th>telephone</th>
            <th>mail</th>
            <th>annee naissance</th>
        </tr>
    
        
        <?php foreach($listeContacts as $unContact): ?>
            <tr>
            <?php foreach($unContact as $info): ?>
                <td><?= $info ?></td>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Requête avec critère</h2>
    <p>Requête : <?= $sql2 ?></p>

    <table border="1px">
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>prenom</th>
            <th>adresse</th>
            <th>code Postal</th>
            <th>Ville</th>
            <th>telephone</th>
            <th>mail</th>
            <th>annee naissance</th>
        </tr>
    
        
        <?php foreach($listeContactsLR as $unContact): ?>
            <tr>
            <?php foreach($unContact as $info): ?>
                <td><?= $info ?></td>
            <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Requête d'insertion</h2>
    
    ...
</body>
</html>