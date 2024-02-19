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

 function getComments(PDO $db): array
 {
     $sql = "SELECT * FROM comments ORDER BY date_heure ASC";
     $query = $db->query($sql);
     $result = $query->fetchAll(PDO::FETCH_ASSOC);
     $query->closeCursor();
     return $result;
 }

function getAllLivreOr(PDO $db): array
{
    return [];
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

$nom = htmlspecialchars(strip_tags(trim($nom)), ENT_QUOTES);
$courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
$titre = htmlspecialchars(strip_tags($titre), ENT_QUOTES);
$texte = htmlspecialchars(strip_tags(trim($texte)), ENT_QUOTES);