<?php

include "connexion.php";

$connectionBD = connectionBD();

session_start();

if(isset($_GET['id']) && isset($_GET['qte'])){
	$article = array(
		"id"=>$_GET['id'],
		"qte"=>$_GET['qte']
	);
	$_SESSION['panier'][] = $article;
	$montantCommande = 0;
}
else if(isset($_GET['sup'])){
	for($i = 0; $i < sizeof($_SESSION['panier']); $i++){
		if($_SESSION['panier'][$i]['id'] == $_GET['sup']){
			unset($_SESSION['panier'][$i]);
			$_SESSION['panier'] = array_values($_SESSION['panier']);
		}
	}
}
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop</title>

</head>
<body>

	<?php require("header.php"); ?>
	<section>
		<header>
            <h2>Mon panier</h2>
		</header>
				
		<? if(empty($_SESSION['panier'])): ?>

			<div id="empty-cart">
				<img src="images/poubelle.png" alt="poubelle">
				<p>Votre panier est vide</p>
			</div>

		<? else: ?>

		<table id="cart-table">
			<tr>
				<th>ID</th>
				<th>Designation</th>
				<th>Quantitée</th>
				<th>Prix</th>
				<th>Supprimer</th>
			</tr>
			<? foreach ($_SESSION['panier'] as $article): ?>
			<? 
				$sql = "select designation, prix, tva from article where id_article=".$article['id'];
				$rep = $connectionBD->query($sql);
				$liste = $rep->fetchAll(PDO::FETCH_ASSOC);
				$montantCommande += $article['qte'] * $liste[0]['prix']+$liste[0]['prix']*($liste[0]['tva']/100);
			?>
			<tr>
				<td><?= $article['id'] ?></td>
				<td><?= $liste[0]['designation'] ?></td>
				<td><?= $article['qte'] ?></td>
				<td><?= $liste[0]['prix'] ?></td>
				<td><a href="panier.php?sup=<?= $article['id'] ?>"><img src="images/delete.png" alt="supp"></a></td>
			</tr>
			<? endforeach; ?>
		</table>
		
		<p id="total-achat">Total : <?= round($montantCommande, 2) ?> €</p>

		<? endif; ?>
				
	</section>

	<?php require("footer.php"); ?>

</body>
</html>