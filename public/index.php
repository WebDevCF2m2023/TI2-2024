<?php
/*
 * Front Controller de la gestion du livre d'or
 */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";

// chargement du modèle de la table livreor
$validation = "livreor";
if(isset($_GET["p"])){
    switch($_GET["p"]){
        case "livreor" :
            $validation = "livreor";
            break;
        default:
        $validation ="404";
        break;
    }
}
/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */
if($validation == "livreor"){
    require_once "../model/livreorModel.php";
    require_once "../view/livreorView.php";
}
/*
 * Si le formulaire a été soumis
 */

    // on appelle la fonction d'insertion dans la DB (addLivreOr())

    // si l'insertion a réussi

    // on redirige vers la page actuelle

    // sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllLivreOr())

// fermeture de la connexion

// Appel de la vue