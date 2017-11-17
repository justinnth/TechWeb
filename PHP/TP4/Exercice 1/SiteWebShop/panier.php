<?php

include "connexion.php";

$connectionBD = connectionBD();

session_start();

//Gestion de la suppression
if(!empty($_GET['sup'])){
	$i = 0;
	foreach($_SESSION['panier'] as $p){
		if($_GET['sup'] === $p['id'])
			array_splice($_SESSION['panier'],$i,1);
		$i++;
	}
}

//Gestion de l'ajout de produit dans le panier
if(isset($_GET['id']) && isset($_GET['qte'])){
	if(!isset($_SESSION['panier']))
		$_SESSION['panier'] = array();

	//Recherche d'un produit dans la session
	$trouve = false;
	$i = 0;
	foreach($_SESSION['panier'] as $p){
		if($_GET['id'] === $p['id']){
			//On ajuste la quantité
			$_SESSION['panier'][$i]['qte'] += $_GET['qte'];
			$trouve = true;
		}
		$i++;
	}

	//Si on ne l'a pas trouvé on l'ajoute
	if(!$trouve){
		$article = array(
			"id"=>$_GET['id'],
			"qte"=>$_GET['qte']
		);
		$_SESSION['panier'][] = $article;
	}

	//Evite d'ajouter des produits lors du F5
	header("Location:panier.php");
}

//On prépare la requête pour l'ensemble des articles dans la session
$sql = "select * from article where id_article=:id";
$result = $connectionBD->prepare($sql);
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
				<th>Designation</th>
				<th>Quantitée</th>
				<th>Prix unitaire</th>
				<th>Prix total</th>
				<th>Supprimer</th>
			</tr>
			<?php 
			$montantCommande = 0;
			foreach ($_SESSION['panier'] as $article):
				$result->execute(array(':id'=>$article['id']));
				$liste = $result->fetch(PDO::FETCH_OBJ);
				$tva = $liste->tva/100;
				$montantCommande += (float) $liste->prix*$article['qte'] + $liste->prix*$tva;
			?>
			<tr>
				<td><a href="vue_produit.php?article=<?= $article['id'] ?>"><?= $liste->designation ?></a></td>
				<td><?= $article['qte'] ?></td>
				<td><?= $liste->prix ?></td>
				<td><?= (float) $liste->prix*$article['qte'] ?></td>
				<td><a href="panier.php?sup=<?= $article['id'] ?>"><img src="images/bin.png" alt="supp"></a></td>
			</tr>
			<? endforeach; ?>
		</table>

		<form id="form-panier" action="commande.php" method="GET" enctype="multipart/form-data" style="float: right !important">
			<p><input value="Valider votre commande »" type="submit"  /></p>
		</form>
		
		<?php $_SESSION['prixTotal'] = $montantCommande ?>
		<p id="total-achat">Total : <?= $montantCommande ?> €</p>

		<? endif; ?>
				
	</section>

	<?php require("footer.php"); ?>

</body>
</html>