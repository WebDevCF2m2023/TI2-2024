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
    <?php if (!empty($submit_message)):?>
    <h2 id="submit-message"><?=$submit_message?></h2>
    <?php endif;?>
    <div id="formulaire">
        <img>
        <form method="post" action="./">
            <h2>Laissez nous un message</h2>
            <div>
                <label for="prenom">Prenom *</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div>
                <label for="mail">E-mail *</label>
                <input type="email" name="mail" id="mail" required>
            </div>
            <div>
                <label for="message">Message *</label>
                <input type="text" name="message" id="message" required>
            </div>
            <p>(*) Ce champ est obligatoire</p>
            <div>
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
    <div id="messages">
        <?php
        ?>
        <h2><?php
        if (count($messages)===0)echo "pas encore de message";
        else if (count($messages)===1)echo "il y a un message écrit";
        else echo "il y a ".count($messages)." messages";
        ?></h2>
        <?php foreach($messages as $message):?>
        <div id="message">
            <h3><span><?=$message["firstname"]?></span> a envoyé ce message le <?=$message["datemessage"]?></h3>
            <p><?=$message["message"]?></p>
        </div>
        <?php endforeach;?>
    </div>
    <script src="js/validation.js"></script>
</body>
</html>
