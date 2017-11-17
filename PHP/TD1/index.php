<?php

//Test

$date = date('d/m/y');
$heure = date('H:i');


//EXO 1

$tva = 0.2;
$prix = 150;
$nombre = 10;

$prixHT = $nombre * $prix;
$prixTTC = $nombre * ($prix + $tva*$prix);

//EXO2

$nbre = 20;
$resultat = 0;
for ($i = 1; $i <= $nbre; $i++) {
	$resultat += $i;
}


//EXO3

setlocale(LC_TIME, "fr_FR");
$date2 = strftime('%d %B %Y');

$nbArticle = 4;

//EXO4

$age = 17;
$reduc = true;
$jour = 2;

function calculerPrix($age, $reduc, $jour)
{
	if ($age < 14)
		$prix = 4;
	elseif ($age < 18) 
		$prix = 5;
	elseif ($jour == 1) 
		$prix = 6;
	elseif ($reduc) 
		$prix = 7;	
	else
		$prix = 8;

	return $prix;
}


//EXO5

$notes = [10,15,16,8,12,3];
$moyenne = 0;
foreach ($notes as $note) {
	$moyenne += $note;
}
$moyenne = $moyenne/sizeof($notes);


//EXO6

$traduction = [
	'Anglais' => 'Français',
	'January' => 'Janvier',
	'February' => 'Février',
	'March' => 'Mars',
	'April' => 'Avril',
	'May' => 'Mai',
	'June' => 'Juin',
	'July' => 'Juillet',
	'August' => 'Aout',
	'September' => 'Septembre',
	'October' => 'Octobre',
	'November' => 'Novembre',
	'December' => 'Décembre',
];
?>



<!DOCTYPE html>
<html>

    <head>
        <title>Exercices php</title>
        <meta charset="utf-8"/>

    </head>

    <body>
        <!--TEST -->
       
        <p><?= "Test réussi" ?></p>
        <p>Nous sommes le <?= $date?>, et il est <?= $heure ?></p>

        <!--EXO1 -->
        <h2>Exercice 1</h2>
        <h3>Calcul sur les variables</h3>
        <p>Prix HT des articles : <?= $prixHT ?>€</p>
        <p>Prix TTC des  articles : <?= $prixTTC ?>€</p>


        <!--EXO2 -->
        <h2>Exercice 2</h2>
        <p>La somme des nombre de 1 à <?= $nbre ?> est égal à <?= $resultat ?></p>
        
        <!--EXO3 -->
        <h2>Exercice 3</h2>
        <?php for ($i = 0; $i < $nbArticle; $i++): ?>
        <article>
        	<header>
        		<h3>Titre 3</h3>
        		<p>Le <?= $date2 ?></p>
        	</header>
        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </article>
    	<?php endfor; ?>
        
        
        
        <!--EXO4 -->
        <h2>Exercice 4</h2>
        <p>Avec les valeurs de simulation suivantes age: <?= $age ?> jour: <?= $jour ?> et reduction : <?= $reduc ?> alors ma place de cinéma coûtera <?= calculerPrix($age, $reduc, $jour) ?>€</p>
        
        <!--EXO5-->
      <h2>Exercice 5</h2>
     	<ul>
     	<?php
     	for ($i = 0; $i < sizeof($notes); $i++) {
     		echo '<li>'.$notes[$i].'</li>';
     	}
     	?>
     	</ul>
        <p>la moyenne est de <?= $moyenne ?></p>
        
        
        
        <!--EXO6-->
        <h2>Exercice 6</h2>
        <table border='1'>
        	<?php
        	foreach ($traduction as $key => $value) {
        		echo '<tr>';
        		echo '<td>'.$key.'</td>';
        		echo '<td>'.$value.'</td>';
        		echo '<tr>';
        	}
        	?>
        </table>




    

    </body>

</html>