<?php

include "connexion.php";
include "utile.php";

$connectionBD = connectionBD();

$sql = "select * from spectacle S, typespectacle T where S.type = T.idSpec";

if ($_POST['send']){
    if (isset($_POST['numType'])){
        $numType = $_POST['numType'];
        if (!empty($numType)){
            if ($numType != 0)
                $sql = "select * from spectacle S, typespectacle T where S.type = $numType and S.type = T.idSpec";
        }
    }
}

if (isset($_GET['mois'])){
    $mois = $_GET['mois'];
    if (!empty($mois)){
        $sql = "select * from spectacle S, typespectacle T where S.type = T.idSpec and month(S.date) = $mois";
    }
}

$sql3 = "select * from typespectacle";

$result = $connectionBD->prepare($sql);
$result3 = $connectionBD->prepare($sql3);

if ($result->execute())
    $spectacles = $result->fetchAll(PDO::FETCH_ASSOC);
else
    $spectacles = array();

//var_dump($spectacles);

if ($result3->execute())
    $typeSpectacles = $result3->fetchAll();
else
    $typeSpectacles = array();

$month = array(
    1 => 'Janv.',
    2 => 'Févr.',
    3 => 'Mars',
    4 => 'Avr.',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juill.',
    8 => 'Août',
    9 => 'Sept.',
    10 => 'Oct.',
    11 => 'Nov.',
    12 => 'Déc.',
);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Index Spectacles</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="wrap">
    <header>
        <h1><a href="index.php"><img src="img/logo.png" alt="la coursive la rochelle"></a></h1>
    </header>

    <main>
        <h2>La saison</h2>
        <nav class="fondJaune">
            <form action="index.php" method="post">
                <select name="numType">
                    <option value="0">Tous/Toutes</option>
                    <?php foreach ($typeSpectacles as $typeSpectacle): ?>
                        <option value="<?= $typeSpectacle['idSpec'] ?>"><?= $typeSpectacle['type'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="GO" name="send" />
            </form>

            <ul>
                <?php foreach ($month as $numMois => $mois): ?>
                    <li><a href="?mois=<?= $numMois ?>"><?= $mois ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!--contenu-->
        <ul>
            <?php foreach ($spectacles as $spectacle):
                $date = new DateTime($spectacle['date']);
            ?>
                <li>
                    <p class="fondJaune">
                        <?php if ($spectacle['plusieursDate'] == 1):?>
                            À partir du
                        <?php endif; ?>
                        <?= $date->format('d M Y') ?>
                    </p>
                    <p><img src="photos/<?= $spectacle['nomDossierPhotos'] ?>/<?= $spectacle['photos'] ?>" alt=""></p>
                    <h3 class="type"><?= $spectacle['type'] ?></h3>
                    <h2 class="jaune"><?= $spectacle['nom'] ?>/<?= $spectacle['compagnie'] ?></h2>
                    <p class=""><?= tronquer_texte($spectacle['description']) ?></p>
                    <p><a href="spectacle.php?id=<?=  $spectacle['id'] ?>"><img src="img/plus.png" alt=""></a></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</div>
</body>
</html>
