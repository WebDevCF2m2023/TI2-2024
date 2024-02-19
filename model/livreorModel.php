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
    $sql = "SELECT * FROM livreor";
    $statement = $pdo->query($sql);

    if($statement === false) return []; // Cas de figure qui ne devrais pas arriver

    $informations = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // Bonne pratique

    return $livreor;
    
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
                    ): bool|string{

                        $firstname = htmlspecialchars(strip_tags(trim($)), ENT_QUOTES);
                        $lastname = htmlspecialchars(strip_tags(trim($)), ENT_QUOTES);
                        $usermail = filter_var($themail, FILTER_VALIDATE_EMAIL);
                        $message = htmlspecialchars(strip_tags(trim($themessage)), ENT_QUOTES);



                        if ($usermail === false || empty($message)) {
                            return false;
                        }
                    }
