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
require_once "../model/commentsModel.php";
require_once "../model/paginationModel.php";


/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */

 try{
    $MyPDO = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET, DB_LOGIN, DB_PWD);

}catch(Exception $e){
    die($e->getMessage());
}

/*
 * Si le formulaire a été soumis
 */
if(isset($_POST['usermail'],$_POST['message'],$_POST['firstname'],$_POST['lastname'])){
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $insert = addLivreOr($MyPDO,$_POST['firstname'],$_POST['lastname'],$_POST['usermail'],$_POST['message']);
    // si l'insertion a réussi
    if($insert===true){
    // on redirige vers la page actuelle
    header("Location: ./");
    exit();   
    // sinon, on affiche un message d'erreur
    }else{
        $message = "Erreur lors de l'insertion";
      } }

// on récupère le nombre total de commentaires
$nbComments = getNumberComments($MyPDO);

if (!empty($_GET[MY_PAGINATION_BY_PAGE]) && ctype_digit($_GET[MY_PAGINATION_BY_PAGE])) {
    $page = (int) $_GET[MY_PAGINATION_BY_PAGE];
} else {
    $page = 1;
}

// remplacement par getCommentsByPage
$pagination = PaginationModel("./", MY_PAGINATION_BY_PAGE, $nbComments, $page, MY_PAGINATION_GET);

/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllLivreOr())
$addLivreOr = getAllLivreOr($MyPDO);

// fermeture de la connexion
$MyPDO = null;

// Appel de la vue

include "../view/livreorView.php";

