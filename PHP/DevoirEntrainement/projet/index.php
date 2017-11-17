<?php

include "connexion.php";

$connectionBD = connectionBD();

$sql = "select * from projets limit 6";

if (isset($_POST['send'])){
    if (isset($_POST['numSujet'])){
        $numSujet = $_POST['numSujet'];
        if (!empty($numSujet)){
            if ($numSujet != '0')
                $sql = "select * from projets where numSujet = $numSujet order by rand() limit 6";
        }
    }
}

$sql2 = "select nom from sujets where id = ?";
$sql3 = "select * from sujets";

$result = $connectionBD->prepare($sql);
$result2 = $connectionBD->prepare($sql2);
$result3 = $connectionBD->prepare($sql3);

if ($result->execute()){
    $projets = $result->fetchAll();
}
else{
    $projets = array();
}


if ($result3->execute()){
    $sujets = $result3->fetchAll();
}
else{
    $sujets = array();
}

?>
<!doctype html>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>LOL</title>

        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
    <div id="wrapper">
        <header>
            <h1>//COLLECTION</h1>
            <form action="index.php" method="post" >
                <p><label>Sort : by</label>
                    <select name="numSujet">
                        <option value="0">All</option>
                        <?php foreach ($sujets as $sujet): ?>
                        <option value="<?= $sujet['id'] ?>"><?= $sujet['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="GO" name="send" />
                </p>
            </form>
        </header>

        <main>
            <ul>
                <?php foreach ($projets as $projet):
                    if ($result2->execute(array($projet['numSujet']))):
                        $sujet = $result2->fetch();
                ?>
                        <li>
                            <article>
                                <img src="<?= $projet['adresseMiniature'] ?>" alt="">
                                <h2><?= $projet['description'] ?></h2>
                                <h3><?= $sujet['nom'] ?></h3>
                                <p><a href="<?= $projet['url'] ?>">LAUNCH PROJECT</a></p>
                            </article>
                        </li>
                <?php endif; endforeach; ?>
            </ul>
        </main>

        <footer>
            <p>Collection  :</p>
        </footer>
    </div>
    </body>
</html>
