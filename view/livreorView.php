<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/validation.css">
</head>
<body>
    
    <h1>Livre d'or</h1>
    <img id="Madame" src="../public/img/email.png" alt="">
    
    <h3><?php if(isset($message))echo $message?></h3>
    <div class="container">
    
    <h2>Laissez-nous un message </h2>

    <form action="" id="Form" name="monForm" method="POST">
    
    <div id="lePrenom">
        <label for="prenom"><strong>Prénom*</strong></label>
        <input type="text" name="firstname" id="Prenom">
    </div>
    <div  id="leNom">
        <label for="nom"><strong>Nom*</strong></label>
        <input name="lastname" type="text"  id="Nom" >
</div>
        <div id="email">
            <label for="mail"><strong>Email*</strong></label>
    <input id="Email" name="usermail" type="email" placeholder="Votre email"><br>
</div>
    <div id="themessage">
        <label for="message"><strong>Message*</strong></label>
    <textarea id="TextArea" name="message" placeholder="Votre message" type="text"></textarea><br>
        </div>
        <input id="Envoyer" type="submit" value="Envoyer mon message" onclick="Validation()">
     </form>
     </div>
     <h4><strong>Message Précédents</strong></h4>
    
            <?php 
            foreach($informations as $information):
            ?>
            <div id="BlockMessage">
            <h4>Posté le <?=$information['datemessage']?></h4>
            <p><?=$information['message']?></p>
          
            </div>
            <?php
            endforeach;
            ?>
            
       
    
<script src="js/validation.js"></script>
</body>
</html>

