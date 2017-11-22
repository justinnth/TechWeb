<?php

if (isset($_GET['nom']) && isset($_GET['prenom']))
    echo "Bonjour ".$_GET['prenom']." ".$_GET['nom'].".";
else
    echo "Bonjour";