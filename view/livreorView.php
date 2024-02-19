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
    <div><center>
        <h1>Livre d'or</h1>
        <img id="imglogo" src="../img/email.png" alt="" width="400px">

    </center>
    </div>
    <main>
        
        
        
        
        <form action="" method="post">
        <h3>Laissez-nous un message</h3>
        <div id="lenom">
            <div><label for="nom">Nom </label></div>
            <input type="text" name="nom" id="nom">
        </div>
        <div id="leprenom">
           <div><label for="prenom">Prénom *</label></div>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div id="mail">
            <div><label for="email">Email *</label></div>
            <input type="text" id="email" name="email" >
        </div>
        <div id="lemessage">
           <div> <label for="msg">Message *</label></div>
            <textarea name="msg" id="msg" cols="30" rows="5" maxlength="1024"></textarea>
        </div>
        <p id="ceChamp">(*) Ce champ est obligatoire</p>
        <center>
        <button type="submit" id="subButton" onclick="return validateForm(event)">Envoyer</button>
        </center>
        </main>
        </div>
    </form>
    <h2>Message precedent</h2>
    <section id="informations">
        <?php 
            foreach(array_reverse($livreor) as $livreors):
        ?>
        <div class="information">
            <div>
                <p><?= $livreors["usermail"] ?></p>
                <p><?=(new DateTime($livreors["datemessage"]))->format('d/m/Y H:i:s')?></p>
            </div>
            <p><?= $livreors["message"] ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>
    <script>
        function validateForm(e){

const nom = document.querySelector("#firstname").value;
const email = document.querySelector("#usermail").value;
const theMessage = document.querySelector("#message").value;

const validNom = nom.length >= 100;
const validEmail = /@/.test(usermail) && /\./.test(usermail);
const validTheMessage = theMessage.trim().length > 600;
}
    </script>
    <script src="js/validation.js"></script>
</body>
</html>