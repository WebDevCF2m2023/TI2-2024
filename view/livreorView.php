<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/validation.css">
</head>

<body>
    <h1 id="titrePrincipal">TI2 | Livre d'or</h1>
    <img src="img/Sign up-amico.png" alt="illustration" id="illustrations">
    <form action="" method="POST" id="formContainer" onsubmit="return submitForm()">
        <h2 id="titreForm">Laissez-nous un message</h2>

        <h3 id="erreur"><?php if (isset($message)) echo $message ?></h3>

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

        <div id="resultat"></div>

        <div id="bouton">
            <input type="submit" value="Envoyer">
        </div>
        

    </form>

    <h3><?php if (empty($informations)) echo "Pas encore de message" ?></h3>

    <h3 id="nbMessage">Il y a <span><?= $nbInformations ?></span> messages écrits</h3>
    <?php
            if (isset($pagination)) echo "<p>$pagination</p>";
            ?>
    <?php

    foreach ($informations as $commentaire) :
    ?>
        <div class="commentaires">
            <h4><?= $commentaire['firstname'] ?> a envoyé ce message le <?= (new DateTime($commentaire['datemessage']))->format('d-m-Y à H\hi') ?></h4>
            <p><?=wordwrap($commentaire['message'],100,"\n",true) ?></p>
            
        </div>
    <?php
    endforeach;
    //var_dump($_POST);
    ?>
    <script src="js/validation.js"></script>
</body>

</html>