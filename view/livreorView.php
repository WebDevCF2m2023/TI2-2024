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
    <div id="img">
        <img src="/img/email.png">
    </div>
    <div id="cadreForm">
        <form action="" method="POST">
            <div>
                <h2>Laissez nous un message</h2>
                <label id="labelPrenom" for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div>
                <label for="nom" id="labelNom">Nom</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div>
                <label for="email" id="labelEmail">Email *</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="message" id="labelMessage">Message *</label>
                <textarea name="message" id="message" cols="30" rows="10" maxlength="600" required></textarea>
            </div>
            <p>(*) Ce champ est obligatoire</p>
            <div>
            <input type="submit" value="Envoyer" id="envoyer" onclick="return submitForm(event)">
            </div>
            </div>
        </form>
    </div>
    <h3>Messages Précédents</h3>
    <div id="allMessages">
        <?php 
        foreach (array_reverse($messages) as $commentaires):?>
            <p class="post1"><?= $commentaires["firstname"]?> a envoyé ce message le <?=(new DateTime($commentaires["datemessage"]))->format('d/m/Y H:i:s')?><br><?= $commentaires["message"]?></p><br>
        <?php endforeach; 
        ?>
    </div>
       
<script src="js/validation.js"></script>
</body>
</html>
