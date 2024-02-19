<?php

/**
 * Permet de récupérer toutes les informations stocké en base de données sous format de tableau associatif
 */
function getAllInformations(PDO $pdo): array{
    $sql = "SELECT * FROM livreor";
    $statement = $pdo->query($sql);

    if($statement === false) return []; // Cas de figure qui ne devrais pas arriver

    $informations = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // Bonne pratique

    return $informations;
    
}

/**
 * Permet d'ajouter une nouvelle information en base de donnée
 * @return bool Si FALSE une erreur s'est produite
 */
function insertNewInformation(PDO $pdo, string $email, string $message): bool{

    $sql = "INSERT INTO informations VALUES (null, ?, ?, null);";
    //$sql = "INSERT INTO informations(themail, themessage) VALUES (?, ?);";

    $statement = $pdo->prepare($sql);
    if($statement === false) return false;

    $state = $statement->execute([$email, $message]);
    if($state === false) return false;

    $statement->closeCursor(); // bonne pratique

    return true;
}