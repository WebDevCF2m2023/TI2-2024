<?php 

// création d'une fonction qui récupère tous les messages dans la db livreor, elle a besoin d'une connexion PDO pour fonctionner, si indique PDO devant le paramètre, on ne peut qu'accepter un objet de type PDO.
// Cette fonction va nous renvoyer un array
function getAllComments(PDO $connectDB): array
{
    $sql = "SELECT `message` FROM livreor"; // requête non exécutée
    $query = $connectDB->query($sql); // exécution de la requête de type SELECT avec query()
    // convertion des données en un tableau indexé (fetchAll) qui contient chaque ligne de résultat en tableau associatif (voir connexion)
    $datas = $query->fetchAll();
    // bonne pratique (autres DB que MySQL ou MariaDB)
    $query->closeCursor();
    // envoie du tableau indexé contenant les pays
    return $datas;
}

// nous retourne le nombre de commentaires avec une requête simple (COUNT)
function getNumberComments(PDO $connect): int
{
    return $connect->query("SELECT COUNT('message') AS nb FROM livreor")->fetch()['nb'];
}

// nous affiche les commentaires par rapport à la page ! lien avec pagination !
function getCommentsByPage(PDO $dbConnect, 
                            int $currentPage=1, 
                            int $nbByPage=10): array
{
    // pour avoir le offset, donc le démmarage du LIMIT 
    $offset = ($currentPage-1)*$nbByPage;

    // création de la requête
    $sql = "SELECT `message` FROM livreor LIMIT $offset, $nbByPage ";
    // exécution de la requête
    $query = $dbConnect->query($sql);
    // envoi du tableau de résultat avec fetchAll (tab indexé contenant des assoc)
    
    return $query->fetchAll();
}