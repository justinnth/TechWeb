<?php

include "connexion.php";

$connectionBD = connectionBD();
$verif = false;
if(isset($_GET['article']) || (!empty($_GET['article']))){
    $numArticle = $_GET['article'];

    $sql = "select * from article where id_article=:id";

    $result = $connectionBD->prepare($sql);
    $verif = true;
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
    <?php 
    if($verif): 
        $result->execute(array(':id'=>$numArticle));
        $article = $result->fetch(PDO::FETCH_ASSOC);
    ?>
        <header>
            <h2><?= $article['designation'] ?></h2>
        </header>

        <img src="<?= $article['img_article'] ?>" alt="image<?= $article['id_article'] ?>">
        <p><?= $article['description'] ?></p>
        <strong><?= $article['prix'] ?> €</strong>

        <form id="form-produit" action="" style="float: right !important">
            <label for="quantite">Quantité :</label>
            <select name="qte" id="quantite">
                <?php for($i = 1; $i <= 5; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>

            <button type="submit" name="send">Ajouter au panier</button>
        </form>
        <?php else: ?>
        <p>Aucun produit ne correspond a votre demande</p>
        <?php endif; ?>
    </article>
    

				

	<?php require "footer.php"; ?>

</body>
</html>