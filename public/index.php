<?php
// Chef d'orchestre
// A chaque requête/click balise <a>, il est appelé

// Once permet d'importer le fichier une seule fois.
// Cela  veut dire que si on essaye a l'avenir de re importer le fichier il ne le fera pas
// On fusionne/incorpore config.php avec l'index.php
require_once "../config.php";
// On incorpore notre model countries afin de pouvoir accèder a sa/ses functions
require_once "../model/livreorModel.php";

// new permet de créer un NOUVEAU objet de la class PDO
// Une nouvelle instance de PDO
$dsn = DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

try{
    // Si une erreur se produit elle sera attrapé dans le catch en toute sécurité
    $myPDO = new PDO($dsn, DB_LOGIN, DB_PWD);
}catch(Exception $e){
    // Si une erreur PDO se produit, on arrête tout en affichant le message d'erreur
    die($e->getMessage());
}


// Permet de récupérer la variable pg dans la barre d'url
// $_GET["pg"]
// Montre la variable en format HTML avec un <pre>
// Adresse + ligne + type + value + length
// var_dump($_GET["pg"]);

$content = "livreorView";
// Si $_GET['pg'] existe et qu'il n'est PAS(!) vide
if(!empty($_GET['pg'])){
    // Le switch permet de traiter des valeurs STATIC
    // Des valeurs fixes, qui ne bouge pas
    switch($_GET['pg']){
        case "pagination":
            $alllivreor = getAllLivreOr($myPDO);
            $content = "pagination";
            break; // Permet de ne pas lire default ou les autres cas si il y en a en dessous

        // Si aucun cas si dessus n'a été validé, le default est lu
        default:
            $content = "error404";
            break;
    }
}


// On intégre/import le fichier HTML
// On fusionne le fichier avec index.php
// $content contient le nom du fichier php
include "../view/$content.html.php";