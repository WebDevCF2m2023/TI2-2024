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
    <header>

        <p id="screenwidth"></p>
        <h1>Livre d'or</h1>
        <img src="/img/email.png" alt="emailImage" id="emailImg">
    </header>
    <div class="myFormDiv">
        <form action="" id="myForm">
            <h2 id="myFormHead">Laissez-nous un message</h2>
            <div id="firstName" class="inputDiv">
                <label for="prenomInput" id = "prenomLabel">Prénom *</label><input type="text" name="prenomInput" id="prenomInput">
            </div>
            <div id="lastName" class="inputDiv">
                <label for="nomInput" id="nomLabel">Nom</label><input type="text" name="nomInput" id="nomInput">
            </div>
            <div id="email" class="inputDiv">
                <label for="emailInput" id="emailLabel">E-mail *</label><input type="text" name="emailInput" id="emailInput">
            </div>
            <div class="inputDiv">
                <label for="yourMessage" id="messageLabel">Message *</label>
            <textarea name="yourMessage" class="inputDiv" id="yourMessageInput" cols="30" rows="10"></textarea>
            </div>
            <div class="inputDiv">
                <button id="sendButton" class="sendBut">Envoyer</button>
            </div>
        </form>
    </div>

    <div class="prevMessages">
        <h3 id="prevMessHead">Messages précedents</h3>
        <?php foreach ($messages as $mess) : ?>
            <div class="messageHolder"><hr>
                <h4><?= $mess["datemessage"] ?></h2>
                <p><?= $mess["message"] ?></p>

                            </div>
<?php
    endforeach;
    ?>
        </div>
    </div>
<script src="js/validation.js"></script>
</body>
</html>


<!-- RGB 66 124 160