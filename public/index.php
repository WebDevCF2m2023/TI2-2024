<?php

// Front controller
$content = "livreorView"; // Default page

// Importation de fichiers
require_once "../config.php"; 
require_once "../model/livreorModel.php";

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
    $insertResult = addLivreOr($db, $_POST['firstname'], $_POST['lastname'], $_POST['message'], $_POST['usermail']);

    if ($insertResult) {
        header("Location: ./");
        exit();
    } else {
        $errorMessage = "Error while inserting";
    }
}
$messages = getAllLivreOr($db);
require_once "../view/$content.php"; 
// fermeture de la connexion
$db = null;