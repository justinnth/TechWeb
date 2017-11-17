<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Formulaire - Page 1</title>
    </head>

    <body>
        <form id="formulaire" method="post" action="formulaireAdresse.php">
            <fieldset >
                <legend>Récupérer des informations : Personne</legend>
                <p>
                    <label for="nom" >Nom*</label>
                    <input type="text" id="nom" name="nom" required />
                </p>
                <p>
                    <label for="prenom">prenom*</label>
                    <input type="text" id="prenom" name="prenom" required />
                </p>        
                <p>
                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required>
                </p>
            </fieldset>
            <p class="submit">
                <input type="submit" id="btnSubmit" value="Suivant" name="send" />
                <input type="reset" id="btnReset" value="Annuler" />      
            </p>
            <p class="note">* information obligatoire</p>
        </form> 


    </body>
</html>
