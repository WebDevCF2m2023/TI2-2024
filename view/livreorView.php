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
<div>
<img src="../img/email.png" alt="email">
</div>

<form action="" id ="myForm">
   
   <div class="form1">


   <div><label class="prenom"for="user_name">Prénom</label>                        
   <input type="text" id="lePrenom" name="user_prenom" required /></div>    

   <div><label class="nom" for="user_prenom">Nom</label>
   <input type="text" id="leNom" name="user_nom" /></div>

   <div><label class="mail" for="user_mdp">E-mail</label>
       <input type="email" id="eMail" name="user_mail" required /></div>

    <div id="lemessage">
        <label for="msg">Message</label>
        <textarea name="themessage" id="msg" cols="30" rows="5" maxlength="1024"></textarea> </div>
           
       
       <input type="submit" value="Envoyer" id="subButton">

<div id="result"></div>

</br>

</form>




<script src="js/validation.js"></script>
</body>
</html>
