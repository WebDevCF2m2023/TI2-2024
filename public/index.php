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
require_once "../model/livreorModel.php";

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
if (isset($_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['message'], $_POST['datemessage'])) {
    
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $insert = addLivreOr($db, $_POST['id'], $_POST['firstname'], $_POST['lastname'], $_POST['message'], $_POST['datemessage']);
    // si l'insertion a réussi
    if ($insert) {
        // on redirige vers la page actuelle
        header("Location: ./"); 
        exit();
    } else {
        // sinon, on affiche un message d'erreur
        $message = "Erreur avec l'insertion";
    }

}

/*
 * On récupère les messages du livre d'or
 */
$messages = getAllLivreOr($db);

// on appelle la fonction de récupération de la DB (getAllLivreOr())

// fermeture de la connexion
$db =null;
// Appel de la vue

include "../view/livreorView.php";


