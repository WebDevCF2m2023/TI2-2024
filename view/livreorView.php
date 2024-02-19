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
    <form id="form1" action="" method="post">
        <div>
            <div id="lenom">
                <label for="nom">Nom*</label>
                <input type="text" name="firstname" id="firstname" require>
            </div>
            <div id="leprenom">
                <label for="prenom">Prénom*</label>
                <input type="text" name="lastname" id="lastname">
            </div>
            <div id="mail">
                <label for="email">Email* :</label>
                <input type="text" id="usermail" name="usermail" >
            </div>
            <div id="lemessage">
                <label for="msg">Message*</label>
                <textarea name="message" id="message" cols="30" rows="5" maxlength="1024"></textarea>
            </div>
           <h4>(*) Ce champs est obligatoire </h4>
           <button type="submit" id="subButton" onclick=" validateForm(event)">S'inscrire</button> 
        </div>
    </form>
    <h1>message presedent</h1>
    <section id="informations">
        <?php 
            foreach(array_reverse($livreor) as $coms):
        ?>
        <div class="information">
            <div>
                <p><?= $coms["firstname"] ?><?php echo " à Envoyer ce message le "; ?></p>
                <p><?=(new DateTime($coms["datemessage"]))->format('d/m/Y H:i:s')?></p>
            </div>
            <p><?= $coms["message"] ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>
    
    <script src="js/validation.js"></script>
</body>
</html>