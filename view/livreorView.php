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
    <div class="mainSection">

    <!--  <p id="screenwidth"></p>  -->
        
        <img src="/img/email.png" alt="emailImage" id="emailImg">
        
    <div class="myFormDiv">
        <form action="" id="myForm" method="POST">
            <h2 id="myFormHead">Laissez-nous un message</h2>
            <div id="firstName" class="inputDiv">
                <label for="prenomInput" id = "prenomLabel">Prénom *</label><input type="text" name="firstname" id="prenomInput">
            </div>
            <div id="lastName" class="inputDiv">
                <label for="nomInput" id="nomLabel">Nom</label><input type="text" name="lastname" id="nomInput">
            </div>
            <div id="email" class="inputDiv">
                <label for="emailInput" id="emailLabel">E-mail *</label><input type="text" name="useremail" id="emailInput">
            </div>
            <div class="messageDiv">
                <label for="yourMessage" id="messageLabel">Message *</label>
                <textarea name="yourMessage"  id="yourMessageInput" cols="30" rows="10" maxlength="600"></textarea>
            </div>
            <p class="obliged">(*) Ce champ est obligatoire</p>
            <div class="sendDiv">
            
                <button id="sendButton" class="sendBut">Envoyer</button>
            </div>
            </div>
        </form>
    </div>

</div>
<div class="prevMessages">
        <h3 id="prevMessHead">Messages précedents</h3>
        <?php foreach ($messages as $mess) : ?>
            <div class="messageHolder">
                <h4><span class="italic"><?=$mess["firstname"]?></span> à envoyé ce message le <?=$mess["datemessage"] ?></h2>
                <p><?= $mess["message"] ?></p>
            </div>
<?php
    endforeach;
    ?>
    </div>
<script src="js/validation.js"></script>
</body>
</html>

