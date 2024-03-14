<?php
/*
 * Model de la liste des pays
 */

/**
 * @param PDO $db
 * @return array
 * Fonction qui récupère tous les pays par ordre de date aalphabetique
 * venant de la base de données 'pays' et de la table 'countries'
 */
function getAllCountries(PDO $db): array
// definir la requete permettant de recuperer toutes les infos des pays
{   $sql = "SELECT * FROM `countries` ORDER BY `nom` ASC;";
// executer cette requete pour interroger la base de données    
    $query = $db->query($sql);
// parcourrir la reponse pour recupere tous les resultats et les stocker dans un tableau    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
// fermer la connexion
    $query->closeCursor();
    // retourner le resultat sous forme de'un tableau dans le but de permetre à la vue de les afficher
    return $result;
}
function getAllCountriesAndFlags(PDO $db): array
// definir la requete permettant de recuperer toutes les infos des pays + url du drapeau
{   $sql = "SELECT countries.*, flags.url FROM countries JOIN flags ON countries.id= flags.id_pays;";
// executer cette requete pour interroger la base de données    
    $query = $db->query($sql);
// parcourrir la reponse pour recupere tous les resultats et les stocker dans un tableau    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
// fermer la connexion
    $query->closeCursor();
    // retourner le resultat sous forme de'un tableau dans le but de permetre à la vue de les afficher
    return $result;
}
