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
    <h1>Livre d'or</h1>

<!-- Page content-->
<div class="container">

    <div id="thatform">
    <img src="img/email.png">
    <form action="" method="POST" name="or" id="form">
        <fieldset>
            <h2> Laissez nous un message</h2>
            <label>Prenom * </label>
            <input type="text" placeholder="" name="prenom" id="prenom" required>
            <br>
            <label>Nom * </label>
            <input type="text" placeholder="" name="nom" id="nom" required>
            <br>
            <label for="email">Adresse mail *</label>
            <input type="text" name="email" id="email" required>
            <div id="mailControl"><p>Il manque soit @ ou .</p></div>
            <br>
            <label>Message *</label>
            <div id="msgControl"><p>Doit comporter au minimum 100 characters</p></div>
            <textarea type= "text" name="message" id="message" cols="30" rows="5" required ></textarea>
            <br>
            <p>(*) Ce champ est obligatoire</p>
            <button id="submeat" type="submit" onsubmit = checking()>Envoyez</button>
            </fieldset>
    </form>
    
    </div>

    <h3><?php if (empty($informations)) echo "Pas encore de message" ?></h3>

    <h3 id="nbMessage">Il y a <span><?= $nbInformations ?></span> messages écrits</h3>
    <?php
            if (isset($pagination)) echo "<p>$pagination</p>";
            ?>
    <?php

    if (isset($message)) {
        ?>
        <div>
            <?php echo $message; ?>
        </div>
        <?php
    }
    ?>
    
    <?php
     foreach ($comments as $commentaire) {
        ?>
        <div class="card">
            <div class="card-header">
                Message de <?php echo $commentaire['firstname']; ?> <?php echo $commentaire['lastname']; ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $commentaire['usermail']; ?> - <?php echo $commentaire['datemessage']; ?></h5>
                <p class="card-text"><?php echo wordwrap($commentaire['message'],35 , "\n", true) ?></p>
            </div>
        </div>
        <?php
    }

        ?>
</div>

<script src="js/validation.js"></script>

</body>
</html>
