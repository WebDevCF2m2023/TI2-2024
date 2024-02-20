<?php
/*
 * Front Controller de la gestion du livre d'or
 */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once ("../config.php");
require_once ("../model/livreorModel.php");
// chargement du modèle de la table livreor

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */
try{
    $db = new PDO(DB_DRIVER.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_LOGIN, DB_PWD);
}catch(Exception $e){
    die($e->getMessage());
}
/*
 * Si le formulaire a été soumis
 */

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message']) ){
    $insert = addLivreOr($db, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['message']);
    if ($insert === true){
        header("Location: /");
        exit();
    }else{
        $message = $insert;
        echo $message;
    }
}
    // on appelle la fonction d'insertion dans la DB (addLivreOr())

    // si l'insertion a réussi

    // on redirige vers la page actuelle

    // sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllLivreOr())
$messages= getAllLivreOr($db);


// fermeture de la connexion
$db = null;
// Appel de la vue

include "../view/livreorView.php";