<?php
session_start();

if(isset($_POST['send'])){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])){
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['email'] = $_POST['email'];
    }
    else{
        header("Location:formulaire.php");
    }
}
else{
    header("Location:formulaire.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Formulaire - Page 2</title>
    </head>

    <body>
        <form id="formulaire" method="post" action="enregistrement.php">
            <fieldset >
                <legend>Récupérer des informations : Personne</legend>
                <p>
                    <label for="adresse" >Adresse*</label>
                    <input type="text" id="adresse" name="adresse" required />
                </p>
                <p>
                    <label for="cp">Code postal*</label>
                    <input type="number" id="cp" name="cp" required />
                </p>        
                <p>
                    <label for="ville">Ville*</label>
                    <input type="text" id="ville" name="ville" required>
                </p>
                <p>
                    <label for="tel">Telephone*</label>
                    <input type="number" id="tel" name="tel" required>
                </p>
                <p>
                    <label for="naissance">Année de naissance*</label>
                    <input type="number" id="naissance" name="naissance" required>
                </p>
            </fieldset>
            <p class="submit">
                <input type="submit" id="btnSubmit" value="Terminer" name="send2" />
                <input type="reset" id="btnReset" value="Annuler" />      
            </p>
            <p class="note">* information obligatoire</p>
        </form> 


    </body>
</html>