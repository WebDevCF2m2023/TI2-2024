<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/validation.css">
</head>
<body>
    <h1>TI2 | Livre d'or</h1>
    <h3><?php 
        if($nbInformation>1 ){ 
            echo "$nbInformation commentaires";}
            else{
                echo"$nbInformation commentaire";
            }?></h3>
    <div>
            <?php 
            foreach($informations as $information):
            ?>
            <h4>Posté le <?=$information['datemessage']?></h4>
            <p><?=$information['message']?></p>
            <?php
            endforeach;
            ?>
        </div>
    <form action="" class="container">
    <img src="../img/email.png" alt="">
    <div id="lePrenom">
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom">
    </div>
    <div id="leNom">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom">
    </div>
   
    <form action="" name="monForm" method="POST">
                <input name="themail" type="email" placeholder="Votre email" required><br>
                <textarea name="themessage" placeholder="Votre message" required></textarea><br>
                <input type="submit" value="Envoyer">
            </form>
<script src="js/validation.js"></script>
</body>
</html>
