<?php

/**
 * Permet de récupérer toutes les informations stocké en base de données sous format de tableau associatif
 */
function getAllInformations(PDO $pdo): array{
    $sql = "SELECT * FROM livreor";
    $statement = $pdo->query($sql);

    if($statement === false) return []; // Cas de figure qui ne devrais pas arriver

    $livreor = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // Bonne pratique

    return $livreor;
    
}

/**
 * Permet d'ajouter une nouvelle information en base de donnée
 * @return bool Si FALSE une erreur s'est produite
 */
function insertNewInformation(PDO $pdo, string $email, string $message): bool{

    $sql = "INSERT INTO livreor VALUES (null, ?, ?, null);";
    //$sql = "INSERT INTO livreor$livreor(themail, themessage) VALUES (?, ?);";

    $statement = $pdo->prepare($sql);
    if($statement === false) return false;

    $state = $statement->execute([$email, $message]);
    if($state === false) return false;

    $statement->closeCursor(); // bonne pratique

    return true;
}

<?php



    // On est super content , on a bien accès a Livre D'or car on est majeur
    require_once "../config.php";
    require_once "../models/livreor$livreorModel.php";

    $db = DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_Port . ";dbname=".DB_NAME.";charset=".DB_CHARSET;
    try{
        $pdo = new PDO($db, DB_USER, DB_PASS);
    }catch(Exception $e){
        die($e->getMessage());
    }

    if(
        isset($_POST['usermail'], $_POST['message']) 
        && filter_var($_POST['usermail'], FILTER_VALIDATE_EMAIL) 
        && !empty(trim($_POST['message']))
    ){
        $theEmail =  htmlspecialchars(strip_tags($_POST['usermail']));
        $theMessage = htmlspecialchars(strip_tags($_POST['message']));
        $success = insertNewInformation($pdo, $theEmail, $theMessage);
    }
    $livreor = getAlllivreor $livreor($pdo);

}else{
    $viewName = "form";
}
