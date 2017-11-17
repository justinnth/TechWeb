<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Envoi de fichier</title>
    </head>

    <body>
        <form id="formulaire" enctype="" method="post" action="traitement.php">
            <fieldset>
                <legend>Transfert de fichier</legend>
                <p>
                    <label for="nom" >Fichier</label>
                    <input type="file" id="nom" name="nom"/>
                </p>
            </fieldset>
            <p class="submit">
                <label for="btnSubmit">Clic</label>
                <input type="submit" id="btnSubmit" value="Envoie" name="send" />    
            </p>
            <p class="note">* information obligatoire</p>
        </form> 


    </body>
</html>