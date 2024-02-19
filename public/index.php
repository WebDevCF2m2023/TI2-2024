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
try {
    $dsn = DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET;
    $db = new PDO($dsn, DB_LOGIN, DB_PWD);
}catch (Exception $e){
    echo $e->getMessage();
    die;
}

//check if submit sucessed
if (isset($_GET["submit_succes"])){
    $submit_message = "message enregistré";
    $submit_status = "valid";
}

/*
 * Si le formulaire a été soumis
 */
$prenom = "";
$nom = "";
$mail = "";
$themessage = "";
if (isset($_POST["prenom"],$_POST["nom"],$_POST["mail"],$_POST["message"])){
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $mail = $_POST["mail"];
    $themessage = $_POST["message"];
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $result = addLivreOr($db, $prenom, $nom, $mail, $themessage);

    // si l'insertion a réussi
    // on redirige vers la page actuelle
    if ($result===true){
        header("Location: ./?submit_succes=true");
        die;
    }
    // sinon, on affiche un message d'erreur
    $submit_message = $result;
    $submit_status = "not-valid";
}

/*
 * On récupère les messages du livre d'or
 */

// on appelle la fonction de récupération de la DB (getAllLivreOr())
$page = 1;
$message_by_page = 4;
if (!empty($_GET["page"]) && ctype_digit($_GET["page"]) && (int)$_GET["page"]>1){
    $page = (int)$_GET["page"];
}
$messages = getPageLivreOr($db, $page, $message_by_page);
$nb_messages = getMessageNumber($db)[0];
$pagination = getPagination($page, ceil($nb_messages/$message_by_page), "page");

// fermeture de la connexion
$db = null;
// Appel de la vue
include "../view/livreorView.php";