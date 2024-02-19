<?php
/*
 * Front Controller de la gestion du livre d'or
 */

 if (isset($_GET['section'])) {

    switch ($_GET['section']) {
        case "livreorView":
            $route = "livreorView.php";
            break;
        case "livreorModel":
            $route = "livreorModel.php";
            break;
        default:
            $route = "error404.html.php";
    }
} else {
    $route = "index.php";

}

 require_once "../view\livreorView.php";

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";
// chargement du modèle de la table livreor

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

 if (isset($_POST['nom'], $_POST['courriel'], $_POST['titre'], $_POST['texte'])) {

    // on appelle la fonction d'insertion dans la DB (addLivreOr())

    $insert = addComments($message, $_POST['nom'], $_POST['courriel'], $_POST['titre'], $_POST['texte']);

    // si l'insertion a réussi

    if ($insert) {
        // on redirige vers la page actuelle
        header("Location: ./?section=livredor");
        exit();
    } else {
        // sinon, on affiche un message d'erreur
        $message = "Erreur lors de l'insertion";
    }

}
/*
* On récupère les messages du livre d'or
*/
// on appelle la fonction de récupération de la DB (getAllLivreOr())

// fermeture de la connexion
$db = null;

// Appel de la vue

include "../view/livreorView.php";