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
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` ASC ";
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
     //On protège les différentes entrées
     $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
     $message = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);
     $firstname = htmlspecialchars(strip_tags(trim($firstname)),ENT_QUOTES);
     $lastname = htmlspecialchars(strip_tags(trim($lastname)),ENT_QUOTES);
     // si un des champs est non valide
     if ($usermail===false || empty($message) || empty($firstname) || empty($lastname)){
         // arrêt du script et envoi un texte
         return "Au moins un des champs est non valide!";
     }
     $sql = "INSERT INTO `livreor`(`firstname`,`lastname`,`usermail`,`message`) VALUES('$firstname','$lastname','$usermail','$message')";
    try{
        $db->exec($sql);
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }
}