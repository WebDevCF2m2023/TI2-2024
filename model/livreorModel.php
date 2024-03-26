<?php
function getAllLivreOr(PDO $db): array
{
  $sql = "SELECT * FROM livreor ORDER BY datemessage DESC";
  $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  return $result ?: []; // Return empty array on errors
}

function addInformations(PDO $db,string $firstname, string $name, string $message, string $usermail)
{
    // gestion du format des variables
    $usermail = filter_var($usermail, FILTER_VALIDATE_EMAIL); // vérifie le mail, le garde en sortie en cas de validité, renvoi false en cas de mail non valide
    $message = htmlspecialchars(strip_tags(trim($message)),ENT_QUOTES);

    // si un des champs est non valide
    if($usermail===false || empty($message)){
        // arrêt du script et envoi du texte
        return "Au moins un des champs invalide";
    }

    $sql = "INSERT INTO `livreor` (`firstname`, `lastname`, `message`, `usermail`) VALUES ('$firstname', '$name', '$message', '$usermail')";
    try{
        $db->exec($sql);
        return true;
    }catch(Exception $e){
        return $e->getMessage(); 
    }
  }
  function getNumberMessages(PDO $db): int
  {
      $sql = "SELECT COUNT(*) as nb FROM `livreor`";
      $query = $db->query($sql);
      $result = $query->fetch(PDO::FETCH_ASSOC);
      $query->closeCursor();
      return $result['nb'];
   
  }

  function getPaginationInformations(PDO $db, int $currentPage,int $nbPerPage): array
{
    $offset = ($currentPage-1)*$nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `datemessage` DESC LIMIT $offset, $nbPerPage ";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}