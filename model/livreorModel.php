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
    $sql = "SELECT * FROM livreor ORDER BY datemessage ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result; 
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
    $firstN = htmlspecialchars(strip_tags(trim($firstname)), ENT_QUOTES);
    $lastN = htmlspecialchars(strip_tags(trim($lastname)), ENT_QUOTES);
    $email = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $texte = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);
    if (empty($firstN) || empty($lastN) || $email === false || empty($texte)) {
        return false;
    }
    // on prépare la requête
    $sql = "INSERT INTO `livreor` (`firstname`, `lastname`, `usermail`, `message`) VALUES ('$firstN', '$lastN', '$email', '$texte')";
    try {
    $db->exec($sql);
    return true;
} catch (Exception $e) {
    return $e->getMessage();
}
}