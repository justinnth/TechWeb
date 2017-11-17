<?php

$tab = array(
    "cours 1"=>array(
        "matière"=>"anglais",
        "coef"=>2,
        "note"=>12),
    "cours 2"=>array(
        "matière"=>"java",
        "coef"=>4,
        "note"=>11),
    "cours 3"=>array(
        "matière"=>"web",
        "coef"=>4,
        "note"=>13)
);

$moyenne = 0;
$sommeNotes = 0;
$sommeCoef = 0;
foreach ($tab as $caracteristiques){
    $sommeNotes += $caracteristiques['note']*$caracteristiques['coef'];
    $sommeCoef += $caracteristiques['coef'];
}
$moyenne = $sommeNotes/$sommeCoef;

?>

<!doctype html>
	
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>LOL</title>
</head>
<body>

<!--affichage-->
<?php foreach ($tab as $cours => $caracteristiques): ?>
    <p><?= $cours ?> : <?= $caracteristiques['matière'] ?> coef (<?= $caracteristiques['coef'] ?>) note (<?=$caracteristiques['note'] ?>)</p>
<?php endforeach; ?>

<!--moyenne-->
<p>La moyenne des 3 notes est de : <?= $moyenne ?></p>

</body>
</html>
