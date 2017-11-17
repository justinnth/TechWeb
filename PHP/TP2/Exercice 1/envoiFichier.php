<?php

$uploaddir = "upload/";
$uploadfile = $uploaddir.$_FILES['fichier']['name'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Envoi de fichier</title>
    </head>

    <body>
        <form id="formulaire" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <legend>Transfert de fichier</legend>
                <p>
                    <label for="nom" >Fichier</label>
                    <input type="file" id="nom" name="fichier" accept="image/jpeg"/>
                </p>
                <p class="submit">
                    <label>Clic</label>
                    <input type="submit" value="Envoi" name="send" />    
                </p>
            </fieldset>
        </form> 

        <h2>Clés et valeurs du tableau $_FILES</h2>
        <table border="1px">
            <tr>
                <th>Clé</th>
                <th>Valeur</th>
            </tr>
            <?php foreach($_FILES['fichier'] as $key => $value): ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $value ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php if(move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)): ?>
            <p>Le transfert est réalisé !</p>
        <?php endif; ?>


    </body>
</html>