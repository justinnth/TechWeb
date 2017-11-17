<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 18/10/2017
 * Time: 08:23
 */

define('NOMSERVEUR','localhost');
define('USERNAME','root');
define('PASSWORD','root');
define('NOMBD','TD6');

function connectionBD($nomServeur = NOMSERVEUR, $username = USERNAME, $password = PASSWORD, $nomBD = NOMBD){
    try{
        $connection = new PDO('mysql:host='.$nomServeur.';dbname='.$nomBD,$username,$password);
        $connection->exec("set character set utf8");

        return $connection;
    }
    catch(Exception $e){
        echo "Erreur : ".$e->getMessage()."<br />";
        echo "N° : ".$e->getCode();
        return null;
    }
}