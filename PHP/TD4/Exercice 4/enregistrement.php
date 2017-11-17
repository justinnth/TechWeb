<?php

session_start();

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

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$email = $_SESSION['email'];

if(isset($_POST['send2'])){
    if(isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['naissance'])){
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $anneeNaissance = $_POST['naissance'];
    }
    else{
        header("Location:formulaireAdresse.php");
    }
}
else{
    header("Location:formulaireAdresse.php");
}

$sql = "insert into contacts (nom,prenom,adresse,codePostal,ville,telephone,mail,anneeNaissance) values ('$nom','$prenom','$adresse',$cp,'$ville',$tel,'$email',$anneeNaissance)";
$rep = $connexionBD->query($sql);

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>TD4 - Exercice 3</title>
</head>
<body>
    <p><?= $nom ?> <?= $prenom ?></p>
    <p><?= $email ?></p>
    <p><?= $adresse ?></p>
    <p><?= $cp ?> <?= $ville ?></p>
    <p><?= $tel ?></p>
    <p><?= $anneeNaissance ?></p>

    <p>Requete : <?= $sql ?></p>
</body>
</html>