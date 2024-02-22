<?php
/*
 * Front Controller de la gestion du livre d'or
 */

 /* require_once "../view/livreorView.php"; */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";
// chargement du modèle de la table livreor
require_once "../model/livreorModel.php";

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */

 try {
    $MonPDO = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET, DB_LOGIN, DB_PWD);
 }catch(Exception $e){
    die($e->getMessage());
 }

/*
 * Si le formulaire a été soumis
 */

 if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['message'])) {

    // on appelle la fonction d'insertion dans la DB (addLivreOr())

    $insert = addLivreOr($MonPDO, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['message']);

    // si l'insertion a réussi

    if ($insert) {
        // on redirige vers la page actuelle
        header("Location: ./");
        exit();
    } else {
        // sinon, on affiche un message d'erreur
        $message = "Erreur lors de l'insertion";
    }

}
/*
* On récupère les messages du livre d'or
*/
$comments = getComments($MonPDO);

// on appelle la fonction de récupération de la DB (getAllLivreOr())
/* $nbInformations = getNbInformations($MonPDO); */

// fermeture de la connexion
$db = null;

// Appel de la vue

include "../view/livreorView.php";