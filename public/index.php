<?php
/*
 * Front Controller de la gestion du livre d'or
 */

/*
 * Chargement des dépendances
 */
// chargement de configuration
require_once "../config.php";
require_once "../Model/livreorModel.php";
require_once "../Model/PaginationModel.php";
// chargement du modèle de la table livreor
/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */
try {
    // création d'une instance de PDO - Connexion à la base de données
    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_LOGIN, DB_PWD);
} catch (Exception $e) {
    die($e->getMessage());
}
/*
 * Si le formulaire a été soumis
 */

 if (isset($_POST['nom'], $_POST['prenom'],$_POST['email'],$_POST['message'])) {
    // on appelle la fonction d'insertion dans la DB
    $insert = addLivreOr($db, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['message']);
}
    // on appelle la fonction d'insertion dans la DB (addLivreOr())

    // si l'insertion a réussi

    // on redirige vers la page actuelle

    // sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */

 // on veut une pagination
if(!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])){
    $page = (int) $_GET[PAGINATION_GET_NAME];
}else{
    $page = 1;
}

$nbInformations = getNbInformations($db);
// on récupère toutes les entrées de la table
// `informations` avec Pagination
$livreor = getPaginationInformations($db,$page,PAGINATION_NB_PAGE);


$pagination = PaginationModel("./",PAGINATION_GET_NAME,$nbInformations,$page,PAGINATION_NB_PAGE);

// on appelle la fonction de récupération de la DB (getAllLivreOr())
// fermeture de la connexion
$db = null;
// Appel de la vue

include "../view/livreorView.php";