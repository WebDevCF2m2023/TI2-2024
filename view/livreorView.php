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

      <!-- <p id="screenwidth"></p>   -->
        
        <img src="/img/email.png" alt="emailImage" id="emailImg">
        <h3><?=$messageError?></h3>
    <div class="myFormDiv">
        <form id="myForm" method="post" onsubmit="validateInputs()">
            <h2 id="myFormHead">Laissez-nous un message</h2>
            <div id="firstName" class="inputDiv">
                <label for="prenomInput" id = "prenomLabel">Prénom *</label><input type="text" name="firstname" id="prenomInput">
            </div>
            <div id="lastName" class="inputDiv">
                <label for="nomInput" id="nomLabel">Nom</label><input type="text" name="lastname" id="nomInput">
            </div>
            <div id="email" class="inputDiv">
                <label for="emailInput" id="emailLabel">E-mail *</label><input type="text" name="usermail" id="emailInput">
            </div>
            <div class="messageDiv">
                <label for="yourMessageInput" id="messageLabel">Message * </label>
                
                <textarea name="message"  id="yourMessageInput" cols="30" rows="10"></textarea>
                <p class = "messCount"><span id="messLenCount">0</span>/600</p>
            </div>
            <p class="obliged">(*) Ce champ est obligatoire</p>
            <div class="sendDiv">
            <h3><?=$messageError?></h3>
                <button id="sendButton" class="sendBut">Envoyer</button>
            </div>
        </form>
    </div>
    </div>


<div class="prevMessages">
        <h3 id="prevMessHead"><?php if (isset($messageCount) && $messageCount < 1) {
                                        echo "Pas des messages précedent"; 
                                    }else if(isset($messageCount) && $messageCount == 1){
                                        echo "Message précedent :" . $messageCount;
                                        }else {
                                            echo "Messages précedents :" . $messageCount;}?> </h3>
        <?php foreach ($messages as $mess) : ?>
            <div class="messageHolder">
                <h4><span class="italic"><?=$mess["firstname"]?></span> à envoyé ce message le <?=$mess["datemessage"] ?></h4>
                <p><?= wordwrap($mess["message"], 100, "\n", true) ?></p>
            </div>
<?php
    endforeach;
  //  var_dump($pageCount); 
    ?>
    </div>
<script src="js/validation.js"></script> 
</body>
</html>

