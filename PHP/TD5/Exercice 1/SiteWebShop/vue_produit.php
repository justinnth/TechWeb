<?php

include "connexion.php";

$connectionBD = connectionBD();

if(!empty($_GET['article'])){
    $numArticle = $_GET['article'];

    $sql = "select * from article where id_article=$numArticle";

    $rep = $connectionBD->query($sql);
    
    $article = $rep->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>SiteWebShop - Article n°<?= $numArticle ?></title>

</head>
<body>

	<?php require "header.php" ?>
		
    <article id="detail-produit">
        <header>
            <h2><?= $article[0]['designation'] ?></h2>
        </header>

        <img src="<?= $article[0]['img_article'] ?>" alt="image<?= $article[0]['id_article'] ?>">
        <p><?= $article[0]['description'] ?></p>
        <strong><?= $article[0]['prix'] ?> €</strong>

        <form id="form-produit" action="" style="float: right !important">
            <label for="quantite">Quantité :</label>
            <select name="qte" id="quantite">
                <?php for($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
            
            <button type="submit">Ajouter au panier</button>
        </form>
    </article>
				

	<?php require "footer.php"; ?>

</body>
</html>