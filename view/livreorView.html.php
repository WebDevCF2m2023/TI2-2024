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
    <div>
  <img src="img\email.png" alt="logo page d'or"> 
    </div>
    <div>
    <h1>Livre d'or</h1>
    <div>
        <h3><?php if(isset($message)) echo $message?></h3>
        <h3><?php 
        echo $nbMessages>1 ? "$nbmessage commentaires" : "$nbMessages commentaire";
        ?></h3>
        <div>
        <?php
    if(isset($pagination)) echo "$pagination<hr>"; 
    echo $pagination ?? null;
    ?>
            <?php

        foreach($messages as $message):
            ?>
        <h4>Posté le <?=$message['firstname']?></h4>
        <p><?=$message['message']?></p>
            <?php
        endforeach;
        //var_dump($_POST);
            ?>
        </div>
        <div>
            
            <form action="" name="monForm" method="POST">
            <form action="" method="post">
     <div id="leprenom">
        <label for="Prénom">Prénom*</label>
        <input type="text" name="prenom" id="nom">
      </div>
      <div id="lenom">
        <label for="Nom">Nom</label>
        <input type="text" name="nom" id="prenom">
      </div>
      <div id="lemail">
        <fieldset>
          <label for="email">E-mail*</label>
          <input type="text" name="email" id="prenom">
      </fieldset>
      <div id="lemessage">
        <label for="msg">Message</label>
        <textarea name="message" id="msg" cols="30" rows="10" maxlength="1024">
        </textarea>
     </div>
      <div id="lergpd">
        <p>(*) ce champs est obligatoire</p>
      </div>
            <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</body>
</html>