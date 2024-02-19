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
    
<h1>Laissez-Nous un message</h1>
    <form action="" method="post">
   <a href="public\img\favicon.png"></a>
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
        <input type="checkbox" name="rgpd" id="rgpd"><label for="rgpd">(*) ce champs est obligatoire</label>
      </div>
      <div id="envoi">
          <input type="submit" value="Envoyer les données">
      </div>
    </form>
  </body>
</html>
        
        
        ?>
        </div>
    <?php
    if(isset($pagination)) echo "$pagination<hr>"; 
    ?>
   
<!-- Bootstrap core JS-->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/MyJS.js"></script>
</body>
</html>