<?php



    if(isset($_POST["sportif"]) && $_POST["sportif"]=="2017")
    {
     
        $sportif1=array("nom"=>"Michael Schumacher","gain"=>"1 milliard de dollars","sport"=>"F1");
        $sportif2=array("nom"=>"Jack Nicklaus","gain"=>"1,2 milliard de dollars","sport"=>"GOLF");
        $sportif3=array("nom"=>"Arnold Palmer","gain"=>"1,4 milliard de dollars","sport"=>"GOLF");
        $sportif4=array("nom"=>"Tiger Woods","gain"=>"1,7 milliard de dollars","sport"=>"GOLF");
        $sportif5=array("nom"=>"Michael Jordan","gain"=>"1,85 milliard de dollars","sport"=>"BASKET");
                                              
        
        
        
        $liste=array($sportif5,$sportif4,$sportif3,$sportif2,$sportif1);
        
        
        $tab=array("description"=>"5 sportifs les mieux payés de tous les temps","infos"=>$liste);
        
        
      
        
    }

else
{
    $tab=array("erreur"=>"Aucune liste de sportif");
    
    
}




  echo json_encode($tab);


?>