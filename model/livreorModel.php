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
 */

function addLivreOr(PDO $db, string $firstname,string $lastname,string $usermail, string $message): bool|string
{
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
}