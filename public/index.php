<?php
/*
 * Front Controller de la liste de pays
 */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once ("../config.php");

// chargement du modèle de la liste de pays
require_once ("../model/paysModel.php");

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */
try{
    $db = new PDO(DB_DRIVER.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_LOGIN, DB_PWD);
}catch(Exception $e){
    die($e->getMessage());
}
// on recupere les donn"es des pays

// on appelle la fonction d'insertion dans la DB (addLivreOr())
//$countries = getAllCountries($db);

$countries = getAllCountriesAndFlags($db);

// fermeture de la connexion
$db = null;
// Appel de la vue

//include "../view/paysView.php";

include "../view/paysDrapeauView.php";