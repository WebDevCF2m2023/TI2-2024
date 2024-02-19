<?php

require_once "../config.php";
require_once "../model/livreorModel.php";

//connect to db
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

$prenom = "";
$nom = "";
$mail = "";
$themessage = "";
//if form submited
if (isset($_POST["prenom"],$_POST["nom"],$_POST["mail"],$_POST["message"])){
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $mail = $_POST["mail"];
    $themessage = $_POST["message"];
    // on appelle la fonction d'insertion dans la DB (addLivreOr())
    $result = addLivreOr($db, $prenom, $nom, $mail, $themessage);

    //redirect to avoid to resend the request
    if ($result===true){
        header("Location: ./?submit_succes=true");
        die;
    }
    //error message
    $submit_message = $result;
    $submit_status = "not-valid";
}

//get the current page
$page = 1;
$message_by_page = 4;
if (!empty($_GET["page"]) && ctype_digit($_GET["page"]) && (int)$_GET["page"]>1){
    $page = (int)$_GET["page"];
}

$nb_messages = getMessageNumber($db)[0];
$messages = getPageLivreOr($db, $page, $message_by_page);
$pagination = getPagination($page, ceil($nb_messages/$message_by_page), "page");

// close the connection
$db = null;
// call view
include "../view/livreorView.php";