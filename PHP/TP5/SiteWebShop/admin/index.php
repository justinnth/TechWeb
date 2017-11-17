<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 20/10/2017
 * Time: 09:42
 */

include "../connexion.php";

$connexion = connectionBD();

$sql = "select * from categorie";

$rep = $connexion->query($sql);

$listeCategories = $rep->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['send'])){
    if (isset($_POST['designation']) && isset($_POST['description']) && isset($_POST['categorie']) && isset($_POST['prix']) && isset($_POST['tva']) && isset($_FILES['image'])){
        $designation = $_POST['designation'];
        $description = $_POST['description'];
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];
        $tva = $_POST['tva'];
        $uploaddir = "images/magasin/";
        $image = $uploaddir.$_FILES['image']['name'];
    }
    else{
        $designation = "";
        $description = "";
        $categorie = "";
        $prix = "";
        $tva = "";
        $image = "";
    }

    if (!empty($designation) && !empty($description) && !empty($categorie) && !empty($prix) && !empty($tva) && !empty($image)){
        //Vérifier l'existence de l'article dans la BDD
        $sql = "select * from article where designation = '$designation'";
        $rep = $connexion->query($sql);
        $article = $rep->fetch(PDO::FETCH_ASSOC);
        if (!empty($article)){
            $articleExiste = true;
        }
        else{
            $articleExiste = false;
        }

        //Si l'article n'existe pas on l'ajopute en base de donnée et on place l'image dans le bon dossier
        if (!$articleExiste){
            if (move_uploaded_file($_FILES['image']['tmp_name'], "../$image")){
                $sql = "insert into article (id_categorie, designation, prix, tva, description, img_article) values ($categorie, '$designation', $prix, $tva, '$description', '$image')";

                $rep = $connexion->query($sql);

                echo "<script>alert(\"Article ajouté avec succés !\");</script>"; //Alerte quand l'article a été ajouté
            }
        }
        else{
            echo "<script>alert(\"L'article que vous voulez ajouter existe déjà !\");</script>"; //Alerte si l'article existe déjà
        }
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Administration</title>
    <link rel="stylesheet" href="cssAdmin/styleAdmin.css">
</head>
<body>
<div id="container">
    <h1>Administration du site OpenShop</h1>
    <h2>Ajout d'article</h2>

    <form enctype="multipart/form-data" method="post" action="">
        <fieldset>
            <legend>Ajout d'un article</legend>
            <p>
                <label for="desi" >Designation :</label>
                <input type="text" id="desi" name="designation"/>
            </p>
            <p>
                <label for="desc" >Description :</label>
                <input type="text" id="desc" name="description"/>
            </p>
            <p>
                <label for="cat" >Catégorie :</label>
                <select id="cat" name="categorie">
                    <?php foreach ($listeCategories as $categorie): ?>
                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom']?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="prix" >Prix :</label>
                <input type="text" id="prix" name="prix"/>
            </p>
            <p>
                <label for="tva" >TVA :</label>
                <input type="text" id="tva" name="tva"/>
            </p>
            <p>
                <label for="image" >Image :</label>
                <input type="file" id="image" name="image" accept="image/jpeg"/>
            </p>
        </fieldset>
        <p class="submit">
            <input type="submit" value="Envoyer" name="send" />
        </p>
    </form>

    <h2>Insertion d'articles via fichier XML</h2>
</div>
</body>
</html>
