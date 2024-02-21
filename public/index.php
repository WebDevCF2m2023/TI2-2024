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
try{
    $MyPDO = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET, DB_LOGIN, DB_PWD);

}catch(Exception $e){
    die($e->getMessage());
}
/*
 * Si le formulaire a été soumis
 */
if(isset($_POST['firstname'],$_POST['lastname'],$_POST['usermail'], $_POST['message'])){
 // on appelle la fonction d'insertion dans la DB (addLivreOr())
  $insert = addLivreOr($MyPDO,$_POST['firstname'],$_POST['lastname'],$_POST['usermail'],$_POST['message']);
    // si l'insertion a réussi
   if($insert===true){
        $message = "Insertion réussie!";
   }else{
     $message = "ERROR insertion default";
   }
}

  

    // on redirige vers la page actuelle

    // sinon, on affiche un message d'erreur

/*
 * On récupère les messages du livre d'or
 */
$totalComments = getNbLivreOr($MyPDO);
if(!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])){
  $p = (int) $_GET[PAGINATION_GET_NAME];
  if($p == 0 || $p > ceil($totalComments / PAGINATION_NB_PAGE)){
    $p = 1;
  }
}else{
  $p = 1;
}

// on appelle la fonction de récupération de la DB (getAllLivreOr())
$informations = getPaginationLivreOr($MyPDO, $p, PAGINATION_NB_PAGE);
$pagination = PaginationLivreOr("", PAGINATION_GET_NAME, $totalComments, $p, PAGINATION_NB_PAGE);
// Appel de la vue

include "../view/livreorView.php";
// fermeture de la connexion
$MyPDO = null;