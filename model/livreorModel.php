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




function getAllLivreOr(PDO $db):array{
    $sql = "SELECT * FROM `livreor`";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $results;
}
function getNbLivreOr(PDO $db): int
{
    $sql = "SELECT COUNT(*) as nb FROM `livreor` ORDER BY `datemessage` ASC ";
    $query = $db->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result['nb'];
}
// fonction qui charge les informations avec pagination
function getPaginationLivreOr(PDO $db, int $currentPage,int $nbPerPage): array
{
    $offset = ($currentPage-1)*$nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC LIMIT $offset, $nbPerPage ";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}


// notre fonction qui insert dans informations



function addLivreOr(PDO $db,string $firstname,string $lastname,string $usermail, string $message): bool|string{
    $sql = "INSERT INTO `livreor`(`usermail`, `message`,`firstname`,`lastname`) VALUES(?, ?, ?, ?)";
    
    $prepare = $db->prepare($sql);
    $prepare->execute([$usermail, $message, $firstname, $lastname]);

    $results = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $prepare->closeCursor();
    return true;
}
// Insertion d'un commentaire
function addComments(PDO $db, string $usermail, string $message,string $firstname  ): bool|string
{
    /*
     * On récupère les données en assurant leur sécurité
     *
     * On utilise la fonction htmlspecialchars pour convertir les caractères spéciaux en entités HTML
     * Le paramètre ENT_QUOTES permet de convertir les guillemets doubles et simples
     * On utilise la fonction strip_tags pour supprimer les balises HTML et PHP
     * On utilise la fonction trim pour supprimer les espaces en début et fin de chaîne
     */

    
    // false si le courriel n'est pas valide, sinon on le garde
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    
    $message = htmlspecialchars(strip_tags(trim($message)), ENT_QUOTES);

    // si les données ne sont pas valides, on envoie false
    if (empty($usermail) || $usermail === false || empty($message)) {
        return false;
    }
     // Max 100 de long && Minimum 4 de long
     if(strlen($firstname) > 100 || strlen($firstname) < 4) return "Le prénom doit avoir minimum 4 caractère et maximum 100.";
     if(strlen($lastname) !== 0 && (strlen($lastname) > 100 || strlen($lastname) < 4)) return "Le nom doit avoir minimum 4 caractère et maximum 100.";
    
     // Max 600 de long et ne peut pas être vide
     if(mb_strlen($message, "UTF-16") > 600 || empty(trim($message))) return "Le message ne peut pas être vide et ne doit pas dépasser 600 caractère";
 
    // on prépare la requête
    $sql = "INSERT INTO `livreor` (`usermail`, `message`,`firstname`,`lastname`) VALUES ('$usermail', '$message','$firstname','$lastname')";
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