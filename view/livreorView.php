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
    <h1>Livre d'or</h1>

    
        <form action="" method="get" name="formulaire">
           <fieldset>
           
           
            <label for="prenom">Prénom* </label>
            <input type="text" placeholder="votre prenom" name="prenomnom" id="firstname">
            <label for="nom">Nom </label>
            <input type="text" placeholder="votre nom" name="nom" id="lastname">
            <label for="mail">Email*</label>
             <input type="mail" placeholder="votre mail" name="mail" id="usermail">
         <div>
            <label for="message">Message*</label><br>
            <textarea id="message" name="message" rows="6" cols="40" maxlength="1200"></textarea><br>
        
         </div>
          </fieldset>
          <h2>(*) Ce champ est obligatoire</h2>
    
    
          
          <input type="submit" value="Envoyer">
        </form>
         <h3>Messages précédents</h3>
         <div id="messages">
            
         <?php foreach($informations as $information):?>
         <div class="message">
            <h4><?=$information['firstname']?> a envoyé ce message le <?=$information['datemessage']?></h4>
            <p><?=$information['message']?></p>

            
         </div>
         <?php endforeach?>
         </div>
    
       
<script src="js/validation.js"></script>
</body>
</html>