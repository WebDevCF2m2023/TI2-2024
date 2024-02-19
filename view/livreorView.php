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
<div id ="logo">
<img src="../img/email.png" alt="email">
</div>

<form action="" method="post" id ="myForm">
   
   <div class="form1">


   <div><label class="prenom"for="firstname">Prénom</label>                        
   <input type="text" id="lePrenom" name="firstname" required /></div>    

   <div><label class="nom" for="lastname">Nom</label>
   <input type="text" id="leNom" name="lastname" /></div>

   <div><label class="mail" for="usermail">E-mail</label>
       <input type="email" id="eMail" name="usermail" required /></div>

    <div id="lemessage">
        <label for="message">Message</label>
        <textarea name="message" id="msg" cols="30" rows="5" maxlength="600"></textarea> </div>
           
       
       <input type="submit" value="Envoyer" id="subButton">

<div id="result"></div>
</div>

</br>

</form>

<h2>Messages précédents</h2>
<section id="comments">
        <?php 
            foreach(array_reverse($addLivreOr) as $add):
                
        ?>
        <div class="messages">
            <div>
                <p><?= $add["firstname"] ?></p>
                <p><?=(new DateTime($add["datemessage"]))->format('d-m-Y à H\hi')?></p>
            </div>
            <p><?= $add["message"] ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>


<script src="js/validation.js"></script>
</body>
</html>
