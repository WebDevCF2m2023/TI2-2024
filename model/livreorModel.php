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
    {
        $sql = "SELECT * FROM livreor ORDER BY thedate ASC";
        $query = $db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $result;
    }
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
    $message = htmlspecialchars(strip_tags($message), ENT_QUOTES);
    /*// false si le courriel n'est pas valide, sinon on le garde
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $titre = htmlspecialchars(strip_tags($titre), ENT_QUOTES);
    $texte = htmlspecialchars(strip_tags(trim($texte)), ENT_QUOTES);*/
    if ($usermail === false || empty($message) || empty($firstname) || empty($lastname)){
        return false;
    }
}