<?php

define("SERVEUR","localhost");
define("USER","root");
define("MDP","root");
define("BD","annuaire");


function connexionBd($hote=SERVEUR,$username=USER,$mdp=MDP,$bd=BD){
    try{
        $connex= new PDO('mysql:host='.$hote.';dbname='.$bd, $username, $mdp);
        $connex->exec("SET CHARACTER SET utf8");	//Gestion des accents
        
        return $connex;
    }
    catch(Exception $e){
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
        return null;
    }
}

$connexionBD = connexionBd();

if(isset($_GET['send'])){
    if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['email'])){
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $email = $_GET['email'];
    }
}

if(isset($_POST['send2'])){
    if(isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['naissance'])){
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $anneeNaissance = $_POST['naissance'];

        $sql = "insert into contacts (nom,prenom,adresse,codePostal,ville,telephone,mail,anneeNaissance) values ('$nom','$prenom','$adresse',$cp,'$ville',$tel,'$email',$anneeNaissance)";
        $rep = $connexionBD->query($sql);

        unset($_GET);
        unset($_POST);
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Formulaire</title>
    </head>

    <body>
        <?php if(!isset($_GET['send'])): ?>
        <form id="formulaire">
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
        <?php endif; ?>

        <?php if(isset($_GET['send'])): ?>
        <form id="formulaire" method="post" action="">
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
        <?php endif; ?>

    </body>
</html>