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
require_once "../model/paginationModel.php";

/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */
try {
    $MyPDO = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,DB_LOGIN, DB_PWD);
} catch (Exception $e) {
    die($e->getMessage());
}
/*
 * Si le formulaire a été soumis
 */
if (isset($_POST['thepassword'],$_POST['thenom'] ,$_POST['themail'], $_POST['themessage'])) {
 
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $insert = addLivreOr($MyPDO,$_POST['thepassword'],$_POST['thenom'] ,$_POST['themail'], $_POST['themessage']);
 
    //Si on obtient une erreur
    if ($insert === true) $message = "Insertion réussie";
    else $message = $insert;
 
 
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
$commentaires =   getAllLivreOr($MyPDO);

$nbInformations = getNbInformations($MyPDO);

// on veut une pagination
if(!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])){
    $page = (int) $_GET[PAGINATION_GET_NAME];
}else{
    $page = 1;
}

// on récupère toutes les entrées de la table
// `informations` avec Pagination
$informations = getPaginationInformations($MyPDO,$page,PAGINATION_NB_PAGE);
 //var_dump($_GET);

$pagination = PaginationModel("./",PAGINATION_GET_NAME,$nbInformations,$page,PAGINATION_NB_PAGE);

// on appelle la fonction de récupération de la DB (getAllLivreOr())
// fermeture de la connexion
$MyPDO = null;
// Appel de la vue


 
include "../view/livreorView.php";