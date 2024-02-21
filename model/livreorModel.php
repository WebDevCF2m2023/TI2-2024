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

 function getAllLivreOr(PDO $db, int $currentPage, int $nbPerPage): array {
    $offset = ($currentPage - 1) * $nbPerPage;
    $sql = "SELECT *, DATE_FORMAT(datemessage, '%d-%m-%Y %H:%i') AS formatted_date FROM `livreor` ORDER BY `datemessage` DESC LIMIT $offset, $nbPerPage";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $results;
}



function getNbLivreOr(PDO $db): int
{
    $sql = "SELECT COUNT(*) as nb FROM `livreor` ORDER BY `datemessage` DESC ";
    $query = $db->query($sql);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $query->closeCursor();
   // return $result['nb'];
   return $db->query("SELECT COUNT('id') AS nb FROM livreor")->fetch()['nb'];

}
// fonction qui charge les informations avec pagination
function getPaginationLivreOr(PDO $db, int $currentPage=1,int $nbPerPage=3): array
{
    $offset = ($currentPage-1)*$nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC LIMIT $offset, $nbPerPage ";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}


// notre fonction qui insert dans informations
function addLivreOr(PDO $db, string $firstname, string $lastname, string $usermail, string $message) {
    $sql = "INSERT INTO `livreor`(`usermail`, `message`, `firstname`, `lastname`) VALUES(?, ?, ?, ?)";
    try {
        // Vérification des champs nécessaires
        if (empty($firstname) || empty($usermail) || empty($message)) {
            throw new Exception("Veuillez remplir tous les champs.");
        }
        
        // Validation du format de l'adresse e-mail
        $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
        if (!$usermail) {
            throw new Exception("Adresse e-mail invalide.");
        }
        
        // Traitement anti-injection et encodage des caractères spéciaux
        $message = htmlspecialchars($message, ENT_QUOTES);
        
        $prepare = $db->prepare($sql);
        $prepare->execute([$usermail, $message, $firstname, $lastname]);
        $prepare->closeCursor(); 
        return true;
    } catch (Exception $e) {
        echo "Erreur lors de l'ajout du message: " . $e->getMessage();
    }
}



// Insertion d'un commentaire
function addComments(PDO $db, string $usermail, string $message,string $firstname  ): bool|string
{
    /*
     * On récupère les données en assurant leur sécurité
     *
   
     * Le paramètre ENT_QUOTES permet de convertir les guillemets doubles et simples
     * On utilise la fonction strip_tags pour supprimer les balises HTML et PHP
     * On utilise la fonction trim pour supprimer les espaces en début et fin de chaîne
     
     */
    
    // false si le courriel n'est pas valide, sinon on le garde
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL);
    // On utilise la fonction htmlspecialchars pour convertir les caractères spéciaux en entités HTML
    $message = htmlspecialchars(strip_tags(trim($message)), ENT_QUOTES);

    // si les données ne sont pas valides, on envoie false
    if (empty($usermail) || $usermail === false || empty($message)) {
        echo "Veuillez remplir tous les champs.";
        return false;
    }
     // Max 100 de long && Minimum 4 de long
     if(strlen($firstname) > 100 || strlen($firstname) < 4){
        echo "Le prénom doit avoir minimum 4 caractère et maximum 100.";
        return false;
     }
     if(strlen($lastname) !== 0 && (strlen($lastname) > 100 || strlen($lastname) < 4)) {
        echo "Le nom doit avoir minimum 4 caractère et maximum 100.";
        return false;
     }
    
     // Max 600 de long et ne peut pas être vide
     if(mb_strlen($message, "UTF-16") > 600 || empty(trim($message))){
         echo "Le message ne peut pas être vide et ne doit pas dépasser 600 caractère";
         return false;
     }
 
    // on prépare la requête
    $sql = "INSERT INTO `livreor` (`usermail`, `message`,`firstname`,`lastname`) VALUES ('$usermail', '$message','$firstname','$lastname')";
    try {
     // on exécute la requête
     $db->exec($sql);
     // si tout s'est bien passé, on affiche un message de succès
     echo "Message ajouté avec succès!";
 } catch (Exception $e) {
     // sinon, on affiche le message d'erreur
     echo "Erreur lors de l'ajout du message: " . $e->getMessage();
 }  
       
}
