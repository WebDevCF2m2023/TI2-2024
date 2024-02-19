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
    <?php
        foreach ($messages as $message):
        ?>
<div class="card">
    <div class="card-header">
<?php echo $message['message'];?>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $message['firstname'];?></h5>
        <p class="card-title"><?php echo $message['message'];?></h5>
        </div>

        <?php
        endforeach;
        ?>
            
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