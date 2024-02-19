<?php
/*
 * Front Controller de la gestion du livre d'or
 */

$content = "livreorView"; //Variable pour la page d'accueil
require_once "../view/$content.php"; // Load the view




/*
 * Chargement des dépendances
 */
// chargement de configuration

require_once "../config.php"; // load the config with database
require_once "../model/livreorModel.php";

// chargement du modèle de la table livreor

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */


try {
    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_LOGIN, DB_PWD);
} catch (Exception $e) {
    die($e->getMessage());
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
