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

 function getComments(PDO $db): array
 {
     $sql = "SELECT * FROM livreor ORDER BY datemessage ASC;";
     $query = $db->query($sql);
     $result = $query->fetchAll(PDO::FETCH_ASSOC);
     $query->closeCursor();
     
     return $result;
 }

function getAllLivreOr(PDO $db): array
{
    return [$comments];
}

function page () {
    
}

/**
 * @param PDO $db
 * @param string $firstname
 * @param string $lastname
 * @param string $usermail
 * @param string $message
 * @return bool|string
 * Fonction qui insère un message dans la base de données 'ti2web2024' et sa table 'livreor'
 */
function addLivreOr(PDO $db,
                    string $firstname,
                    string $lastname,
                    string $usermail,
                    string $message
                    ): bool|string
{

    $firstname = htmlspecialchars(strip_tags(trim($firstname)), ENT_QUOTES);
    $lastname = htmlspecialchars(strip_tags($lastname), ENT_QUOTES);
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($message)), ENT_QUOTES);
    
    if (empty($firstname) || empty($lastname)  || $usermail === false || empty($message)) {
        return false;
    }

    // on prépare la requête
    $sql = "INSERT INTO livreor (firstname, lastname, usermail, `message`) VALUES ('$firstname', '$lastname', '$usermail', '$message')";
    try {
        // on exécute la requête
        $db->exec($sql);
        // si tout s'est bien passé, on renvoie true
        return true;
    } catch (Exception $e) {
        // sinon, on renvoie le message d'erreur
        return $e->getMessage();
    }
}



