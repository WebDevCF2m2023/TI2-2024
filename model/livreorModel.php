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

 /* ce function n'est plus utiliser car tout est gerer dans paginationModel()
function getAllLivreOr(PDO $db): array
{
    $sql = "SELECT * FROM livreor ORDER BY datemessage DESC"; 
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result; 
}
*/
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
    $firstN = htmlspecialchars(strip_tags(trim($firstname)), ENT_QUOTES);
    $lastN = htmlspecialchars(strip_tags(trim($lastname)), ENT_QUOTES);
    $email = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    $texte = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);
    if (empty($firstN) || empty($lastN) || $email === false || empty($texte)) {
        return false;
    }

    $sql = "INSERT INTO `livreor` (`firstname`, `lastname`, `usermail`, `message`) VALUES ('$firstN', '$lastN', '$email', '$texte')";
    try {
    $db->exec($sql);
    return true;
} catch (Exception $e) {
    return $e->getMessage();
}
}

function countMessages($db){

    $query = $db->query("SELECT COUNT('message') AS nb FROM livreor");
    $messageCount = $query->fetch();
    return $messageCount['nb'];

}



// fonction utilisateur de pagination au format texte
function paginationModel(string $url, // url (pour garder les autres variables get)   - moi, je n'aime pas PascalCase :D
                        string $getName, // le nom de notre variable get de pagination
                        int $nbTotalItem, // le nombre total d'item à afficher
                        int $currentPage=1,  // la page actuelle
                        int $nbByPage=10 // la nombre d'item par page
                        ): string|null 
{
    // pas d'item, pas de pagination
    if($nbTotalItem===0) return null;
    // création de la variable de sortie au format texte
    $sortie="";
    // on calcule le nombre de page en divisant le nombre
    // total d'item par le nombre d'item par page
    // le tout arrondit à l'entier supérieur ceil
    // et retourné en entier avec (int), ceil() retourne un float
    $nbPage = (int) ceil($nbTotalItem/$nbByPage);

    // si une seule page, pas de pagination
    if($nbPage<2) return null;

    // on commence par le bouton précédent
    if($currentPage===1){
        // pas de liens
        $sortie.= "<< <";
    }elseif ($currentPage===2) {
        // liens vers l'accueil sans duplicate content (./ = ./?pg=1)
        $sortie.= "<a href='$url'><<</a> <a href='$url'><</a>";
    }else{
        // liens vers l'accueil et la page précédente
        $sortie.= "<a href='$url'><<</a> <a href='$url?&$getName=".($currentPage-1)."'><</a>";
    }

    // on boucle sur le nombre de pages
    for($i=1;$i<=$nbPage;$i++)
    {
        // si on est sur la page en cours, on affiche un texte
        if($i===$currentPage) $sortie.= " $i ";
        // sinon si on affiche la page 1, on évite le duplicate content
        else if($i===1) $sortie.= " <a href='$url'>$i</a> ";
        // sinon on affiche un lien
        else $sortie.= " <a href='$url?&$getName=$i'>$i</a> ";
    }

    // on termine par le bouton suivant, utilisation d'une ternaire pour remplacer un il et else
    $sortie.= $currentPage === $nbPage ? "> >>" : "<a href='$url?&$getName=".($currentPage+1)."'>></a> <a href='$url?&$getName=$nbPage'>>></a>";

    return $sortie;
}

function getPaginationInformations(PDO $db, int $currentPage, int $nbPerPage)
{
    $offset = ($currentPage - 1) * $nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC LIMIT $offset,$nbPerPage"; // DESC mis par préférence car ASC mettre toujours le commentaire plus recent sur le dernier page et ça n'est pas user-friendly (avant version pagination, ASC est acceptable car on doit pas navigé pour voir notre nouvelle commentaire) - désolé que vos commentaires ne sont pas en premier ;)
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}