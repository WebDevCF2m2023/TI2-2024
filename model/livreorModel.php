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

/*
function getAllLivreOr(PDO $db): array
{ $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` ASC ";
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
 

function addLivreOr(PDO $db, string $firstname,string $lastname,string $usermail, string $message): bool|string
{ $sql = "INSERT INTO `informations`(`themail`, `themessage`) VALUES(?,?)";
   
    // gestion du format des variables
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL); // vérifie le mail, le garde en sortie en cas de validité, renvoi false en cas de mail non valide
    $message = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);

    // si un des champs est non valide
    if($usermail===false || empty($message)){
        // arrêt du script et envoi du texte
        return false;
    }

    $sql = "INSERT INTO `message` (`usermail`,`message`,`firstname`,`lastname`) VALUES ('$usermail','$message','$firstname','$lastname')";
    try{
        $db->exec($sql);
        return true;
    }
    catch(Exception $e){
        return $e->getMessage(); 
    }
}*/
function getAllLivreOr(PDO $db):array{
    $sql = "SELECT * FROM `livreor`";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $results;
}


// notre fonction qui insert dans informations



function addLivreOr(PDO $db,string $firstname,string $lastname,string $usermail, string $message): bool|string{
    $sql = "INSERT INTO `livreor`(`usermail`, `message`,`firstname`,`lastname`) VALUES(?,?,?,?)";
    $prepare = $db->prepare($sql);
    $prepare->bindValue(1,$usermail,PDO::PARAM_STR);
    $prepare->bindValue(2,$message,PDO::PARAM_STR);
    $prepare->bindValue(3,$firstname,PDO::PARAM_STR);
    $prepare->bindValue(4,$lastname,PDO::PARAM_STR);
    $prepare->execute();
    $results = $prepare->fetchAll(PDO::FETCH_ASSOC);
    return $results;
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
    // on prépare la requête
    $sql = "INSERT INTO comments (usermail, message) VALUES ('$usermail', '$message')";
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