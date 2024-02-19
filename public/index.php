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
    if($insert === true){
    // on redirige vers la page actuelle
    $message = "Insertion réussie! ";
    }
    // sinon, on affiche un message d'erreur
    else{
        $message = $insert;
    }
    }
     
 
// on appelle la fonction de récupération de la DB (getAllLivreOr())
$informations = getAllLivreOr($MyPDO);

$nbInformations = COUNT($informations);
// fermeture de la connexion
$MyPDO = null;
// Appel de la vue
 
include "../view/livreorView.php";


// le stress me fait oublier tout ce que je connais par coeur je me suis mélée tt les pinceaux ya un petit truc qui cloche mais je ne suis pas arriver a le trouver 

