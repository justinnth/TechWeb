<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ajout d'évènement</title>
    </head>

    <body>
        <form id="formulaire" method="post" action="">
            <fieldset>
                <legend>Ajouter un évènement</legend>
                <p>
                    <label for="nom" >Nom de l'évènement</label>
                    <input type="text" id="nom" name="nom"/>
                </p>
                <p>
                    <label for="date" >Date</label>
                    <input type="date" id="date" name="date" value/>
                </p>
                <p>
                    <label for="heure" >Heure</label>
                    <input type="" id="heure" name="heure" value="14:00"/>
                </p>
                <p>
                    <label for="desc" >Description</label>
                    <textarea name="description" id="desc" cols="30" rows="10"></textarea>
                </p>
                <p class="submit">
                    <label>Clic</label>
                    <input type="submit" value="Envoi" name="send" />    
                </p>
            </fieldset>
        </form> 
    </body>
</html>