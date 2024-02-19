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
      
        <p><?php 
       
        ?></p>
        <div>
        <?php
    if(isset($pagination)) echo "$pagination<hr>"; 
    echo $pagination ?? null;
    ?>
    <h1>Livre d'or</h1>
    <img src="..\img\email.png"  >

    
        <form action="" method="post" name="formulaire">
           
           
            <h2>Laissez-nous un message</h2>
            <label for="prenom">Prénom* </label>
            <input type="text" placeholder="votre prenom" name="firstname" id="firstname"><br>
            <label for="nom">Nom </label>
            <input type="text" placeholder="votre nom" name="lastname" id="lastname"><br>
            <label for="mail">Email*</label>
             <input type="mail" placeholder="votre mail" name="usermail" id="usermail"><br>
      
            <label for="message">Message*</label><br>
            <textarea id="message" name="message" rows="6" cols="40" maxlength="600"></textarea><br>
        
         <h3>(*) Ce champ est obligatoire</h3>
          
          
    
    
          
          <input type="submit" value="Envoyer" >
         
        </form>
         <h4>Messages précédents</h4>
         <div id="messages">
            
         <?php foreach($informations as $information):?>
         <div class="message">
            <h5><?=$information['firstname']?> <?=$information['lastname']?> a envoyé ce message le <?=$information['datemessage']?></h5>
            <p><?=$information['message']?></p>

            
         </div>
         <?php endforeach?>
         </div>
         <form onsubmit="return validateForm()"></form>
       
<script src="js/validation.js"></script>
</body>
</html>