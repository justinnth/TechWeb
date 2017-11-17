<?php 

if(isset($_GET['produit']) && isset($_GET['prix'])){
    echo "Produit : ".$_GET['produit']."<br>";
    echo "Prix : ".$_GET['prix'];
}
else{
    header("Location:info.php");
}

?>