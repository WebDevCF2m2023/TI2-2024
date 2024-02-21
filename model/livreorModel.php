<?php
function getAllLivreOr(PDO $db): array
{
  $sql = "SELECT * FROM livreor ORDER BY datemessage DESC";
  $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  return $result ?: []; // Return empty array on errors
}

// fonction qui charge les informations avec pagination
function getPaginationInformations(PDO $db, int $currentPage,int $nbPerPage): array
{
    $offset = ($currentPage-1)*$nbPerPage;
    $sql = "SELECT * FROM `livreor` ORDER BY `thedate` ASC LIMIT $offset, $nbPerPage ";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}
function addLivreOr(PDO $db, string $firstname, string $lastname, string $message, string $usermail): bool
{
  $data = [
    ":firstname" => htmlspecialchars(strip_tags($firstname), ENT_QUOTES),
    ":lastname" => htmlspecialchars(strip_tags($lastname), ENT_QUOTES),
    ":message" => htmlspecialchars(strip_tags($message), ENT_QUOTES),
    ":usermail" => filter_var($usermail, FILTER_VALIDATE_EMAIL),
  ];

  if (empty($data[":message"]) || empty($data[":firstname"]) || empty($data[":lastname"]) || $data[":usermail"] === false) {
    return false; // Indicate validation failure
  }

  $sql = "INSERT INTO livreor (firstname, lastname, usermail, message) VALUES (:firstname, :lastname, :usermail, :message)";
  $statement = $db->prepare($sql);

  if (!$statement) {
    return false; // Indicate prepare error
  }

  try {
    $statement->execute($data);
    return true;
  } catch (Exception $e) {
    throw $e; // Re-throw exception for external handling
  }
}
