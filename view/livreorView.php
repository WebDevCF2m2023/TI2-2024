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
    <div>
        <img id="img" src="img/email.png" alt="">
    </div>
    <form action="" method="post">
        <div>
            <div id="lenom">
                <label for="nom">Nom*</label>
                <input type="text" name="firstname" id="nom" require>
            </div>
            <div id="leprenom">
                <label for="prenom">Prénom*</label>
                <input type="text" name="lastname" id="prenom">
            </div>
            <div id="mail">
                <label for="email">Email* :</label>
                <input type="text" id="email" name="usermail" >
            </div>
            <div id="lemessage">
                <label for="msg">Message*</label>
                <textarea name="message" id="msg" cols="30" rows="5" maxlength="1024"></textarea>
            </div>
           <h4>(*) Ce champs est obligatoire </h4>
            <button type="submit" id="subButton" onclick="validateForm(event)">Envoyer</button>
        </div>
    </form>
    <h1>message presedent</h1>
    <section id="informations">
        <?php 
            foreach(array_reverse($livreor) as $livreors):
        ?>
        <div class="information">
            <div>
                <p><?= $livreors["firstname"] ?><?php echo " à Envoyer ce message le "; ?></p>
                <p><?=(new DateTime($livreors["datemessage"]))->format('d/m/Y H:i:s')?></p>
            </div>
            <p><?= $livreors["message"] ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>
    <script src="js/validation.js"></script>
</body>
</html>