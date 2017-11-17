<?php

include "utile.php";
include "connexion.php";

$connectionBD = connectionBD();

$sql = "select * from article order by rand() limit 3";

//Envoi de la requête
$rep = $connectionBD->query($sql);

$listeArticles = $rep->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop</title>

</head>
<body>

	<?php require "header.php" ?>

	<section>
		<header>Bienvenue <span class="ss-titre">Nous sommes le ?????? </span></header>
		<p>La boutique en ligne <strong>openSHOP</strong> est un travail réalisé par <em>Thomas Jouannic</em> & <em>Jérome Saunier</em> puis modifié et adapté <strong>au cours de Sites Web Avancés</strong>.</p>
		<p>Dans la partie haute, vous trouverez un moyen pour vous identifiez ou créer un compte si vous n'en n'avez aucun. Le champ de recherche vous permet d'afficher simplement les produits correspondants à ce que vous souhaitez. Vous pouvez aussi naviguer entre les différentes catégorie de produits en cliquant sur celle que vous désirez voir.</p>
		<p>Bonne naviguation !</p>
	</section>

	<section>
		<header>
			<h2>Au hasard...</h2>
		</header>
				
		<!--Affichage de 3 articles au hasard -->
		<ul id="product-list">
			<?php foreach($listeArticles as $article): ?>
				<li class="product">
					<h3><?= $article['designation'] ?></h3>
					<img src="<?= $article['img_article'] ?>" alt="image<?= $article['id_article'] ?>"><br>
					<h3><?= $article['prix'] ?> €</h3>
					<p><?= tronquer_texte($article['description']) ?></p>
					<a href="vue_produit.php?rticle=<?= $article['id_article'] ?>">Voir les détails...</a>
				</li>
			<?php endforeach; ?>
		</ul>
				
	</section>

	<?php require "footer.php"; ?>

</body>
</html>