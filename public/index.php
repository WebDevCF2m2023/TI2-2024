<?php
/*
 * Front Controller de la gestion du livre d'or
 */

$content = "livreorView"; //Variable pour la page d'accueil




/*
 * Chargement des dépendances
 */
// chargement de configuration

require_once "../config.php"; // load the config with database
require_once "../model/livreorModel.php";
require_once "../model/paginationModel.php";

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

if (isset($_POST['firstname'], $_POST['lastname'], $_POST['message'], $_POST['usermail'])) {

    $insert = addLivreOr($db, $_POST['firstname'], $_POST['lastname'], $_POST['usermail'], $_POST['message']);
    if ($insert) {
        header("Location: ./");
        $message = "Insertion Reussi";
        exit();
    } else {
        $message = $insert;
    }
}



/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllLivreOr())

$informationsAll = getAllLivreOr($db);
$nbInformations = getNbInformations($db);


if (!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])) {
    $page = (int) $_GET[PAGINATION_GET_NAME];
} else {
    $page = 1;
}


$informations = getPaginationInformations($db, $page, PAGINATION_NB_PAGE);

$pagination = PaginationModel("./", PAGINATION_GET_NAME, $nbInformations, $page, PAGINATION_NB_PAGE);


require_once "../view/$content.php"; // Load the view

// fermeture de la connexion

$db = null;