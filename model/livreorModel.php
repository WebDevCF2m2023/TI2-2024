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
function getAllLivreOr(PDO $pdo): array
{
    $sql = "SELECT * FROM livreor";
    $statement = $pdo->query($sql);
    // Permet de récupérer toute les lignes SQL en tableau associatif
    $livreor = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // bonne pratique
    return $livreor;
}

/**
 * @param PDO $db
 * @param string $firstname
 * @param string $lastname
 * @param string $usermail
 * @param string $message
 * @return bool|string Une chaine de caractère si une erreur s'est produite, sinon FALSE si les informations données sont invalides. TRUE si tout est bon
 * Fonction qui insère un message dans la base de données 'ti2web2024' et sa table 'livreor'
 */
function addLivreOr(PDO $pdo,
                    string $firstname,
                    string $lastname,
                    string $usermail,
                    string $message
                    ): bool|string
{
    // Max 100 de long
    if(strlen($firstname) > 100 || strlen($lastname) > 100) return false;
    // Minimum 4 de long
    if(strlen($firstname) < 5|| strlen($lastname) < 5) return false;
    // Doit être un email valide
    if(!filter_var($usermail, FILTER_VALIDATE_EMAIL)) return false;
    // Max 600 de long et ne peut pas être vide
    if(strlen($message) > 600 || empty(trim($message))) return false;

    $sql = "INSERT INTO livreor VALUES(null, ?, ?, ?, ?, null)";
    $statement = $pdo->prepare($sql);
    if($statement === false) return "Une erreur s'est produite lors de l'initialisation d'une requête préparer dans livreorModel";
    try{
        if($statement->execute([$firstname, $lastname, $usermail, $message]) === false)
            return "La requête préparer dans livreorModel n'a pas pu s'éxecuter";
    }catch(Exception $e){
        return $e->getMessage();
    }
    $statement->closeCursor(); // bonne pratique
    return true;
}