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
    $sql = "SELECT * FROM livreor ORDER BY datemessage DESC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
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
