<?php
/*
 * Model de la page livre d'or
 */

/**
 * @param PDO $db
 * @return array
 * Fonction qui récupère tous les messages du livre d'or par ordre de date croissante
 * venant de la base de données 'ti2web2024' et de la table 'livreor'
 */
function getAllLivreOr(PDO $db): array
{
    $sql = "SELECT * FROM livreor"; /*Selectionne le tableau livreor */
    $query = $db->query($sql); /* Prépare et Exécute une requête SQL*/ 
    $result = $query->fetchAll(PDO::FETCH_ASSOC); /*Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif*/
    $query->closeCursor(); /*Ferme le curseur, permettant à la requête d'être de nouveau exécutée*/
    return $result; /*J'ai bloqué pendant plusieurs heures a cause d'une erreur dans mon code a cet endroit (return [];) qui retournait un tableau vide*/
}

/**
 * +++++
 * @param PDO $db
 * @param string $firstname
 * @param string $lastname
 * @param string $usermail
 * @param string $message
 * @return bool|string
 * Fonction qui insère un message dans la base de données 'ti2web2024' et sa table 'livreor'
 */
function addLivreOr(PDO $db, string $firstname, string $lastname, string $usermail, string $message): bool|string
{
    $firstname = htmlspecialchars(strip_tags(trim($firstname)), ENT_QUOTES);
    $lastname = htmlspecialchars(strip_tags(trim($lastname)), ENT_QUOTES);
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);  // false si le courriel n'est pas valide, sinon on le garde
    $themessage = htmlspecialchars(strip_tags($message), ENT_QUOTES);
    
     
     if (empty($firstname) || empty($lastname) || $usermail === false || empty($message)) {
         return false;
     } // si les données ne sont pas valides, on envoie false
     
     $sql = "INSERT INTO livreor (firstname, lastname, usermail, `message`) VALUES ('$firstname','$lastname','$usermail','$message')";
     try {  // on prépare la requête
         
         $db->exec($sql); // on exécute la requête
         
         return true; // si tout s'est bien passé, on renvoie true
     } catch (Exception $e) {
         
         return $e->getMessage();  // sinon, on renvoie le message d'erreur
     }
    return false;
    }