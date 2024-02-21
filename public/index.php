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
require_once "../model/pagination.php";
/*
 * Connexion à la base de données en utilisant PDO
 * Avec un try catch pour gérer les erreurs de connexion
 */
    try{
    $MyPDO = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,DB_LOGIN,DB_PWD);
        }catch(Exception $e){
    die($e ->getMessage());
    }
/*
 * Si le formulaire a été soumis
 */
    if(isset($_POST['usermail'],$_POST['message'],$_POST['firstname'],$_POST['lastname'])){
 
   
 
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $insert = addLivreOr($MyPDO,$_POST['firstname'],$_POST['lastname'],$_POST['usermail'],$_POST['message']);
    // si l'insertion a réussi
 
    
    if ($insert) {
        // on redirige vers la page actuelle
        header("Location: ./");
        exit();
    } else {
        // sinon, on affiche un message d'erreur
        $message = "Erreur lors de l'insertion";
    }
    // sinon, on affiche un message d'erreur
     
}


if(!empty($_GET[PAGE_VAR_GET]) && ctype_digit($_GET[PAGE_VAR_GET])){
    $page = (int) $_GET[PAGE_VAR_GET];
}else{
    $page = 1;
}
$nbComments = countComments($MyPDO) ;
 
$pagination = PaginationModel("./",PAGE_VAR_GET,$nbComments,$page,PAGE_BY_PG);
 
// on récupère les commentaires par page
$informations = getPaginationComments($MyPDO,$page,PAGE_BY_PG);

// fermeture de la connexion
$MyPDO = null;
// Appel de la vue
 
include "../view/livreorView.php";
    