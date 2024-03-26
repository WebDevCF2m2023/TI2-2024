<?php

// Front controller
$content = "livreorView"; // Default page
// Importation de fichiers
require_once "../config.php"; 
require_once "../model/livreorModel.php";

// pagination
require_once "../model/PaginationModel.php";
// Connexion à la base de donnée en PDO
// Se connecter à la base de données à l’aide de PDO
try {
    $db = new PDO(
        DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT,
        DB_LOGIN,
        DB_PWD
    );
} catch (Exception $e) {
    die($e->getMessage());
}

// Gérer l’envoi des formulaires
if (isset($_POST['firstname'], $_POST['lastname'], $_POST['message'], $_POST['usermail'])) {
    $insertResult = addInformations($db, $_POST['firstname'], $_POST['lastname'], $_POST['message'], $_POST['usermail']);

    if ($insertResult === true)  {
        header("Location: ./");
        exit();
    } else {
        $errorMessage = "Error while inserting";
        echo $insertResult;
    }
}

$nbMessages = getNumberMessages($db);
if(!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])){
    $page = (int) $_GET[PAGINATION_GET_NAME];
}else{
    $page = 1;
}
// on récupère toutes les entrées de la table
// `informations` avec Pagination
$pagination = PaginationModel("./",PAGINATION_GET_NAME,$nbMessages,$page,PAGINATION_NB_PAGE);


$messages = getPaginationInformations($db, $page, PAGINATION_NB_PAGE);
require_once "../view/$content.php"; 
// fermeture de la connexion

$db = null;
