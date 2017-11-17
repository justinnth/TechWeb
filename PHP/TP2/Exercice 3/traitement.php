<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Traitement</title>
    </head>

    <body>
        <?php
        $filename = "evenements.xml";

        if(file_exists($filename)){
            $evenements=simplexml_load_file($filename);

            $event = $evenements->addChild('event');
            $event->addChild('nom','Apéro');
            $event->addChild('date','2013-10-19');
            $event->addChild('heure','19:00');
            $event->addChild('info',"C'est le week-end");

            $enregistrement = $evenements->asXml();
            file_put_contents($filename, $enregistrement);
        }

        ?>
    </body>
</html>