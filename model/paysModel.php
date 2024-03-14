<?php
/*
 * Model de la liste des pays
 */

/**
 * @param PDO $db
 * @return array
 * Fonction qui récupère tous les pays par ordre de date aalphabetique
 * venant de la base de données 'pays' et de la table 'capitals'
 */
function getAllcountries(PDO $db): array
// definir la requete permettant de recuperer toutes les infos des pays
{   $sql = "SELECT * FROM countries ORDER BY nom ASC;";
// executer cette requete pour interroger la base de données    
    $query = $db->query($sql);
// parcourrir la reponse pour recupere tous les resultats et les stocker dans un tableau    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
// fermer la connexion
    $query->closeCursor();
    // retourner le resultat sous forme de'un tableau dans le but de permetre à la vue de les afficher
    return $result;
}
function getAllFlags(PDO $db): array
// definir la requete permettant de recuperer toutes les infos des pays + url du drapeau
{   //$sql = "SELECT countries.*, flags.url FROM capitals JOIN flags ON capitals.id= flags.id_pays;";
    $sql = "SELECT countries.nom, countries.iso, countries.population, countries.superficie, continents.nom AS continent, capitals.nom AS capitale, capitals.population AS popu_cap, capitals.altitude, flags.url
    FROM countries
    JOIN capitals ON countries.id = capitals.id_pays
    JOIN flags ON flags.id_pays = countries.id
    JOIN countries_continents ON countries_continents.id_pays=countries.id
    JOIN continents ON continents.id=countries_continents.id_continent
    ORDER BY countries.nom ASC;";
// executer cette requete pour interroger la base de données    
    $query = $db->query($sql);
// parcourrir la reponse pour recupere tous les resultats et les stocker dans un tableau    
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
// fermer la connexion
    $query->closeCursor();
    // retourner le resultat sous forme de'un tableau dans le but de permetre à la vue de les afficher
    return $result;
}
