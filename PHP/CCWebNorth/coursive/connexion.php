<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 27/10/2017
 * Time: 09:50
 */

define('NOMSERVEUR','localhost');
define('USERNAME','root');
define('PASSWORD','root');
define('NOMBD','Coursive 2015');

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