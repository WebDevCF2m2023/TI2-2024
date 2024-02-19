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
function getAllLivreOr(PDO $db): array{
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC;";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $results = $query->fetchAll();
    return $results;
}

/**
 * @param PDO $db
 * @param int $page
 * @param int $nb_page
 * @return array
 * Fonction qui récupère les messages de la page du livre d'or par ordre de date croissante
 * venant de la base de données 'ti2web2024' et de la table 'livreor'
 */
function getPageLivreOr(PDO $db, int $page, int $nb_page):array{
    $first = ($page-1)*$nb_page;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC LIMIT $first,$nb_page;";
    $query = $db->query($sql, PDO::FETCH_ASSOC);
    $results = $query->fetchAll();
    return $results;
}

function getMessageNumber(PDO $db):array{
    $sql = "SELECT COUNT(*) FROM `livreor`;";
    $query = $db->query($sql, PDO::FETCH_NUM);
    $results = $query->fetch();
    return $results;
}

function getPagination(int $current_page, int $nb_pages, string $page_get){
    $next_page = $current_page+1;
    $previous_page = $current_page-1;
    $result = "<div>";
    if ($current_page!==1){
        $result.="<a href='./'><<</a><a href='./?$page_get=$previous_page'><</a>";
    }else {
        $result.="<a><<</a> <a><</a>";
    }
    for ($i=1;$i<=$nb_pages;$i++){
        if ($current_page===$i)$result.="<a> $i </a>";
        else if ($current_page!==1 || $current_page!==$i)$result.="<a href='./?$page_get=$i'> $i </a>";
        else $result.="<a href='./'> 1 </a>";
    }
    if ($current_page!==$nb_pages){
        $result.="<a href='./?$page_get=$nb_pages'>>></a> <a href='./?$page_get=$next_page'>></a>";
    }else {
        $result.="<a>>></a> <a>></a>";
    }
    $result.="</div>";
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
                    ): bool|string{

    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);
    $firstname = htmlspecialchars(strip_tags(trim($firstname)),ENT_QUOTES);
    $lastname = htmlspecialchars(strip_tags(trim($lastname)),ENT_QUOTES);
    if (!$usermail)return "email non valide";
    if (empty($message))return "format du message invalide";
    if (empty($firstname))return "format du prenom invalide";

    $sql = "INSERT INTO `livreor`(firstname, lastname, usermail, message) VALUES('$firstname', '$lastname', '$usermail', '$message');";
    try{
        $db->exec($sql);
    }catch (Exception $e) {
        return $e->getMessage();
    }
    return true;
}