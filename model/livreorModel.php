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
//Fonction qui récupère le nombre de commentaires
function getNbInformations(PDO $db): int
{
    $sql = "SELECT COUNT(*) as nb FROM `livreor` ORDER BY `datemessage` ASC";
    $query = $db->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result['nb'];
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
                    )
{
    $firstname = htmlspecialchars(strip_tags(trim($firstname)), ENT_QUOTES);
    $lastname = htmlspecialchars(strip_tags(trim($lastname)), ENT_QUOTES);
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($message)), ENT_QUOTES);

    // si les données ne sont pas valides ou vide, cela retourne une erreur
    if (empty($firstname) || empty($lastname)  || $usermail === false || empty($message)) {
        return false;
    }
//requete sql pour insérer dans les données dans la table livreor
    $sql = "INSERT INTO `livreor` (`firstname`,`lastname`,`usermail`,`message`) VALUES ('$firstname','$lastname','$usermail','$message')";

    //Cela tente d'executer la requete sql, si ça réussit, ça retourne true sinon, cela retourne un message d'erreur
    try {
        $db->exec($sql);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
   
}

function getPaginationInformations(PDO $db, int $currentPage, int $nbPerPage): array
{
    $offset = ($currentPage - 1) * $nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` ASC LIMIT $offset,$nbPerPage";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}