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
    <?php


var_dump($_GET, $_POST);
?>
    <div>
        <img src="img/email.png" alt="">
    </div>
    <form action="" method="POST" class="form">
        <div id="leprenom">
            <label for="prenom">Prénom *</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div id="lenom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div id="lusername">
            <label for="username">E-mail *</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div id="lemessage">
            <label for="message">Message *</label>
            <textarea name="message" id="message" cols="30" rows="10" maxlength="600" required></textarea>
        </div>
        <div id="envoi">
            <input type="submit" value="Envoyer" onclick="control()">
        </div>
    </form>


    


    <div>
        <?php
        if (isset($message)) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
            <?php
        }
        ?>
    </div>

        

    <section id="informations">
        <?php 
            foreach($informations as $information):
        ?>
        <div class="information">
            <div>
                <p><?= $information["firstname"] ?></p>
                <p><?=(new DateTime($information["datemessage"]))->format('d/m/Y H:i:s')?></p>
            </div>
            <p><?= $information["message"] ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>

<script src="js/validation.js"></script>
</body>
</html>
