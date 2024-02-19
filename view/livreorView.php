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

<form action="" method="POST" id="formContainer">
<h2>Laissez-nous un message</h2>
<div id="leprenom">
    <label for="firstname">Prénom *</label>
    <input type="text" name="firstname" id="firstname" required>
</div>
<div id="lenom">
    <label for="lastname">Nom *</label>
    <input type="text" name="lastname" id="lastname" required>
</div>
<div id="lemail">
    <label for="usermail">E-mail *</label>
    <input type="email" name="usermail" id="usermail" required>
</div>
<div id="lemessage">
    <label for="message">Message *</label>
    <textarea name="message" id="message" cols="30" rows="5" maxlength="600" required></textarea>
</div>
<div id="bouton">
    <input type="submit" value="Envoyer">
</div>


</form>

    <h3><?php if (empty($commentaires)) echo "Pas encore de message" ?></h3>
    <h3>Il y a <?= $nbInformations ?> messages écrits</h3>
    <?php

foreach ($commentaires as $commentaire) :
    ?>
        <h4><?= $commentaire['firstname'] ?> a envoyé ce message le <?= $commentaire['datemessage'] ?></h4>
        <p><?= $commentaire['message'] ?></p>
    <?php
    endforeach;
//var_dump($_POST);
?>
<script src="js/validation.js"></script>
</body>
</html>
