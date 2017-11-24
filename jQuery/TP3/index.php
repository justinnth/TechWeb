<?php

include "connectionBD.php";
session_start();

$connection = connectionBD();

if(isset($_COOKIE['numTel'])){
  if(!empty($_COOKIE['numTel']))
    $_SESSION['numTel'] = $_COOKIE['numTel'];
}
else
  $_SESSION['numTel'] = 1;

$sql = "SELECT * FROM telephones WHERE num = ".$_SESSION['numTel'];

$result = $connection->prepare($sql);

if ($result->execute()) 
  $telephone = $result->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
   <head>
      <title>tp9-CSS</title>
      <link rel="stylesheet" type="text/css" href="base.css" />
      <meta charset="utf-8">
   </head>
   <body>
      <div class="wrapper">
          <header>
            <h1>Mobile Phone Company</h1>
            <ul id="Sysmenu">
                  <li><a href="#"             id="p1"  accesskey="1" title="Homepage (Alt-1)">Home</a></li>
                  <li><a href="#startcontent" id="p2"  accesskey="2" title="Skip over navigation (Alt-2)">Skip nav</a></li>
                  <li><a href="#"             id="p3"                title="News about your site">News</a></li>
                  <li><a href="#"             id="p4"  accesskey="9" title="Contact us by email or via an electronic form (Alt-9)">Contact</a></li>
                  <li><a href="#"    id="sitemap"      accesskey="s" title="Sitemap (Alt-s)">Sitemap</a></li>
                  <li><a href="#"             id="p5"  accesskey="0" title="Help and Accessibility Charter (Alt-0)">Help</a></li>
               </ul> <!-- This ends the system menu options -->
          </header> <!-- End of div#Header -->
          
         <main> 
          <div id="Contenu_principal">
          <img id="changer" src="Habillage/fleche-bleue.gif" alt="Changer de modèle">
             <h1 id="modele"><?= $telephone['Nom'] ?></h1>
             <img id="imgPhone" src="Photos/<?= $telephone['Photo'] ?>" alt="Photo du modele" />
               <p id="article">
               <?= $telephone['Commentaire'] ?>
              </p>

               <h2>Title - h2</h2>
               <p>
                  Donec ultricies varius quam. Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus. Aliquam neque magna, varius id, tempor non, molestie ac, magna.
                  Aliquam non mi. Mauris quam purus, imperdiet at, ullamcorper id, tincidunt sed, ligula.
                  Ut nulla nibh, consectetuer ac, iaculis quis, adipiscing vitae, nunc. Fusce quis mauris
                  nec erat mattis faucibus.
               </p>

               <h3>Title - h3</h3>
               <p>
                  Donec ultricies varius quam. Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus. Aliquam neque magna, varius id, tempor non, molestie ac, magna.
                  Aliquam non mi. Mauris quam purus, imperdiet at, ullamcorper id, tincidunt sed, ligula.
                  Ut nulla nibh, consectetuer ac, iaculis quis, adipiscing vitae, nunc. Fusce quis mauris
                  nec erat mattis faucibus. Aliquam id est. Vestibulum ante ipsum primis in faucibus orci.
               </p>
            </div> <!-- End of div#Contenu_principal -->

            <!-- *************************************************************************************** -->

            <div id="Contenu_secondaire">

               <h2>Title - h2</h2>

               <p>
                  Donec ultricies varius quam. Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus. Aliquam neque magna, varius id, tempor non, molestie ac, magna.
                  Aliquam non mi. Mauris quam purus, imperdiet at, ullamcorper id, tincidunt sed, ligula.
                  Ut nulla nibh, consectetuer ac, iaculis quis, adipiscing vitae, nunc.
               </p>

               <h3>Title - h3</h3>               
                  <p id="Highlight" >
                     Donec ultricies varius quam. Cum sociis natoque penatibus et magnis dis parturient montes,
                     nascetur ridiculus mus. Aliquam neque magna, varius id, tempor non, molestie ac, magna.
                     Aliquam non mi. Mauris quam purus, imperdiet at, ullamcorper id, tincidunt sed, ligula.
                     Ut nulla nibh, consectetuer ac, iaculis quis, adipiscing vitae, nunc. Fusce quis mauris
                     nec erat mattis faucibus. Aliquam id est.
                  </p>
       
           </div> <!-- End of div#Contenu_secondaire -->      
         </main> <!-- End of div#Contenu -->         

         <footer>
            <p>Université de La Rochelle - 17000 LA ROCHELLE - 2015</p>
         </footer> <!-- End of div#Footer -->
      </div> <!-- End of div#Wrapper -->

      <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
      <script src="js/comportement.js"></script>
   </body>
</html>