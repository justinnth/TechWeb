<?php
    if(isset($_POST["angou"]) && $_POST["angou"]=="2016")
    {
     
        $bd1=array("nom"=>"Les vieux fourneaux","auteur"=>"lupano cauuet","prix"=>"prix du public cultura");
        $bd2=array("nom"=>"Building stories","auteur"=>"chris ware","prix"=>"prix special du jury");
        $bd3=array("nom"=>"San Mao le petit vagabond","auteur"=>"zhang leping","prix"=>"prix du patrimoine");
        
        
        
        $prix=array($bd1,$bd2,$bd3);
        
        
        $retour=array("festival"=>"angouleme","annee"=>"2015","prix"=>$prix);
        
        
      
        
    }

else
{
    $retour=array("erreur"=>"Quel festival");
    
    
}




  echo json_encode($retour);


?>