<?php

function connexionPDO($hote,$username,$mdp,$bd) {
    try {
        $connex= new PDO('mysql:host='.$hote.';dbname='.$bd, $username, $mdp);
        $connex->exec("SET CHARACTER SET utf8");
        //Gestion des accents
        return $connex;
    } catch(Exception $e) {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
        return null;
    }
}

$connexion=connexionPDO("localhost","root","root","mobilephones");

// Combien de téléphones dans la table ?
$requete="select count(Num)as n from telephones";
$tab=$connexion->query($requete);
$resultat = $tab->fetchAll(PDO::FETCH_OBJ);
$n=$resultat[0]->n ;

// Choisir un téléphone au hazard
$numChoisi=rand(1, $n) ;


//recuperation du contenu 
$requete="select Commentaire from telephones where num=$numChoisi";
$tab=$connexion->query($requete);
$resultat = $tab->fetchAll(PDO::FETCH_OBJ);

//$message="Voici le numéro d'un des téléphones de la table choisi au hasard : $numChoisi" ;
//$message= htmlentities($message) ; // Pour éviter le problème d'affichage des accents
echo $resultat[0]->Commentaire ;
?>