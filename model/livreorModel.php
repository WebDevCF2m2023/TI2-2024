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
function getAllInformations(PDO $pdo): array{
    $sql = "SELECT * FROM livreor";
    $statement = $pdo->query($sql);

    if($statement === false) return []; // Cas de figure qui ne devrais pas arriver

    $livreor = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // Bonne pratique

    return $livreor;  
}



/**
 * Permet d'ajouter une nouvelle information en base de donnée
 * @return bool Si FALSE une erreur s'est produite
 */
function insertNewInformation(PDO $pdo, string $email, string $message): bool{

    $sql = "INSERT INTO livreor VALUES (null, ?, ?, null);";
    //$sql = "INSERT INTO informations(themail, themessage) VALUES (?, ?);";

    $statement = $pdo->prepare($sql);
    if($statement === false) return false;

    $state = $statement->execute([$email, $message]);
    if($state === false) return false;

    $statement->closeCursor(); // bonne pratique

    return true;
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
    return false;
}