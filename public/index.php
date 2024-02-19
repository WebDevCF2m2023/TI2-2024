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
try{
    $dsn = DB_DRIVER . ":host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET.";port=".DB_PORT;
    $pdo = new PDO($dsn, DB_LOGIN, DB_PWD);
}catch(Exception $e){
    die($e->getMessage());
}

/*
 * Si le formulaire a été soumis
 */
if(isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["message"])){
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $success = addLivreOr($pdo, $_POST["prenom"], $_POST["nom"], $_POST["email"], $_POST["message"]);
    $error = false;
    $message = "Le message a bien été envoyé 🤗";
    // Si une erreur s'est produite
    if($success !== true){
        $error = true;
        $message = "Le message n'a pas pu être envoyé 😥";
        // Si une erreur côté PDO s'est produite
        // On affichera l'erreur SQL
        if(gettype($success) === "string")
            $message = $success;
    }
    
}
/*
 * On récupère les messages du livre d'or
 */

$currentPage = 1;
$maxPages = ceil(getCountLivreOr($pdo) / NUMBER_COMMENT_BY_PAGE);
// Variable de pagination dans l'url 
if(!empty($_GET[PREFIX_PAGE]) && ctype_digit($_GET[PREFIX_PAGE])){
    $currentPage = (int)$_GET[PREFIX_PAGE];
    if($currentPage <= 0 || $currentPage > $maxPages)
        $currentPage = 1;
}

$livreOr = getLivreOrByLimit($pdo, NUMBER_COMMENT_BY_PAGE, ($currentPage - 1 ) * NUMBER_COMMENT_BY_PAGE);
$pagination = getPaginationView($currentPage, $maxPages);

// fermeture de la connexion
$pdo = null;
// Appel de la vue

include "../view/livreorView.php";