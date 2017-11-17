<?php

include "utile.php";
include "connexion.php";

$connectionBD = connectionBD();

if(!empty($_GET['cat'])){
    $numCategorie = $_GET['cat'];
    setcookie("categorie", $numCategorie);
    
    if($numCategorie == "all")
        $sql = "select * from article";
    else
        $sql = "select * from article where id_categorie=$numCategorie";

    $rep = $connectionBD->query($sql);
    
    $listeArticles = $rep->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop - </title>

</head>
<body>

	<?php require "header.php" ?>
		
    <section>
        <header>
            <h2>Catégorie <small>n°<?= $numCategorie ?></small></h2>
        </header>
        
        <ul id="product-list">
            <?php foreach($listeArticles as $article): ?>
            <li class="product">
                <h3><?= $article['designation'] ?></h3>
                <img src="<?= $article['img_article'] ?>" alt="image<?= $article['id_article'] ?>"><br>
                <h3><?= $article['prix'] ?> €</h3>
                <p><?= tronquer_texte($article['description']) ?></p>
                <a href="vue_produit.php?article=<?= $article['id_article'] ?>">Voir les détails...</a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>				

	<?php require "footer.php"; ?>

</body>
</html>