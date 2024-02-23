<?php
// Chef d'orchestre
// A chaque requête/click balise <a>, il est appelé

// Once permet d'importer le fichier une seule fois.
// Cela  veut dire que si on essaye a l'avenir de re importer le fichier il ne le fera pas
// On fusionne/incorpore config.php avec l'index.php
require_once "../config.php";
// On incorpore notre model countries afin de pouvoir accèder a sa/ses functions
require_once "../model/livreorModel.php";
require_once "../model/paginationModel.html.php";
// new permet de créer un NOUVEAU objet de la class PDO
// Une nouvelle instance de PDO


try{
    // Si une erreur se produit elle sera attrapé dans le catch en toute sécurité
    $myPDO = new PDO( DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN , DB_PWD  );
}catch(Exception $e){
    // Si une erreur PDO se produit, on arrête tout en affichant le message d'erreur
    die($e->getMessage());
}


// Permet de récupérer la variable pg dans la barre d'url
// $_GET["pg"]
// Montre la variable en format HTML avec un <pre>
// Adresse + ligne + type + value + length
// var_dump($_GET["pg"]);

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message']) ){
    $insert = addLivreOr($myPDO, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['message']);
    if ($insert === true){
        header("Location: /");
        exit();
    }else{
        $message = $insert;
        echo $message;
    }
}
$nbMessages = getNbMessages($myPDO);
// on veut une pagination
if(!empty($_GET[PAGINATION_GET_NAME]) && ctype_digit($_GET[PAGINATION_GET_NAME])){
    $page = (int) $_GET[PAGINATION_GET_NAME];
}else{
    $page = 1;
}

// on récupère toutes les entrées de la table
// `informations` avec Pagination
$messages = getPaginationInformations($myPDO,$page,PAGINATION_NB_PAGE);
 //var_dump($_GET);

$pagination = PaginationModel("./",PAGINATION_GET_NAME,$nbMessages,$page,PAGINATION_NB_PAGE);


/*$messages= getAllLivreOr($myPDO);*/


// On intégre/import le fichier HTML
// On fusionne le fichier avec index.php
// $content contient le nom du fichier php
include "../view/livreorView.html.php";