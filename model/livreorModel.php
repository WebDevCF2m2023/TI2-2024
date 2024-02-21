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
{   $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}
function getNumberMessages(PDO $db): int
{
    $sql = "SELECT COUNT(*) as nb FROM `livreor` ORDER BY `datemessage` DESC ";
    $query = $db->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result['nb'];

    /*return $connect->query("SELECT COUNT('id') AS nb FROM countries")->fetch()['nb'];*/
}

function getMessagesByPage(PDO $db, 
                            int $currentPage=1, 
                            int $nbByPage=10): array
{
    // pour avoir le offset, donc le démmarage du LIMIT 
    $offset = ($currentPage-1)*$nbByPage;

    // création de la requête
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC LIMIT $offset, $nbByPage ";
    // exécution de la requête
    $query = $db->query($sql);
    // envoi du tableau de résultat avec fetchAll (tab indexé contenant des assoc)
    
    return $query->fetchAll();
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
    $lastname = htmlspecialchars(strip_tags(trim($lastname)), ENT_QUOTES);
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(strip_tags($message));
    if (empty($message) || $usermail === false || empty($firstname)){
    return false;
    }
$sql = "INSERT INTO `livreor` (`firstname`, `lastname`, `usermail`, `message`) VALUES ('$firstname', '$lastname', '$usermail', '$message')";
try{
    $db->exec($sql);
    return true;
}catch (Exception $e){
    return $e->getMessage();
}
}
