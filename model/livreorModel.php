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
    $sql = "SELECT * FROM livreor ORDER BY datemessage ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;

}
//Fonction qui récupère le nombre de commentaires
function getNbInformations(PDO $db): int
{
    $sql = "SELECT COUNT(*) as nb FROM `livreor` ORDER BY `datemessage` ASC";
    $query = $db->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result['nb'];
}

function getPaginationInformations(PDO $db, int $currentPage,int $nbPerPage): array
{
    $offset = ($currentPage-1)*$nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` desc LIMIT $offset, $nbPerPage ";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
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
                    )
                    
                    {

                        $firstname = htmlspecialchars(strip_tags(trim($firstname)), ENT_QUOTES);
                        $lastname = htmlspecialchars(strip_tags(trim($lastname)), ENT_QUOTES);
                        $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
                        $message = htmlspecialchars(strip_tags(trim($message)), ENT_QUOTES);


                        if (strlen($firstname)> 100 || strlen($lastname)> 100|| strlen($message)>600){
                            return false;
                        }

                        if ($usermail === false || empty($message) || empty($lastname)) {
                            return false;
                        }
                        $sql = "INSERT INTO livreor (firstname,lastname,usermail,`message`) VALUES (?,?,?,?)";
    try {
        // on exécute la requête
        $p = $db->prepare($sql);
        $p->execute([$firstname,$lastname,$usermail,$message]);
        // si tout s'est bien passé, on renvoie true
        return true;
    } catch (Exception $e) {
        // sinon, on renvoie le message d'erreur
        return $e->getMessage();
                    }
                }
