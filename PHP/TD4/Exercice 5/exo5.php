<?php

if(isset($_POST['send'])){
    if(isset($_POST['nom'])){
        $prenom = $_POST['nom'];

        setcookie("nom", $prenom, time()+60*60*24*7);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TD 4 - Exercice 5</title>
    </head>

    <body>
        <?php if(!isset($_COOKIE['nom'])): ?>
        <form id="formulaire" method="post">
            <fieldset >
                <legend>Entrez votre nom</legend>
                <p>
                    <label for="nom">Nom*</label>
                    <input type="text" id="nom" name="nom" required />
                </p>
            </fieldset>
            <p class="submit">
                <input type="submit" id="btnSubmit" value="Suivant" name="send" />
                <input type="reset" id="btnReset" value="Annuler" />      
            </p>
            <p class="note">* information obligatoire</p>
        </form> 
        <?php else: ?>
        <p>Bonjour Monsieur <?= $_COOKIE['nom'] ?></p>
        <?php endif; ?>


    </body>
</html>