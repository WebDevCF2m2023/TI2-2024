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
    <img src="/img/email.png">
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
                <textarea name="message" id="message" cols="30" rows="10" maxlength="1000" required></textarea>
            </div>
            <p>(*) Ce champ est obligatoire</p>
            <div>
            <input type="submit" value="Envoyer" id="envoyer">
            </div>
      </div>
        </form>
    </div>
<script src="js/validation.js"></script>
</body>
</html>
