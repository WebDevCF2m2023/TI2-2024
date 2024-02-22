<?php 

// nous retourne le nombre de commentaires avec une requête simple (COUNT)
function getNumberComments(PDO $connect): int
{
    $sql = "SELECT COUNT(*) as nb FROM `livreor` ORDER BY `datemessage` ASC";
    $query = $connect->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result['nb'];
}


// nous affiche les commentaires par rapport à la page ! lien avec pagination !
function getCommentsByPage(PDO $dbConnect, 
                            int $currentPage, 
                            int $nbByPage): array
{
    // pour avoir le offset, donc le démmarage du LIMIT 
    $offset = ($currentPage-1)*$nbPerPage;

    // création de la requête
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` ASC LIMIT $offset, $nbPerPage ";
    // exécution de la requête
    $query = $dbConnect->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}

/*function getPaginationInformations(PDO $db, int $currentPage, int $nbPerPage): array
{
    $offset = ($currentPage - 1) * $nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` ASC LIMIT $offset,$nbPerPage";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}*/