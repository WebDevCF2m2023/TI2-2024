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

<div id="container">
<h1>Livre d'or</h1>
    <div id="imge">
        <img src="img/email.png">
    </div>
    <form action="" method="POST" >
           <div>
                <h2>Laissez nous un message</h2>
                <label id="labelPrenom" for="prenom">Prénom *</label>
                <input type="text" name="prenom" id="prenom"  required>
            </div>
            <div>
                <label for="nom" id="labelNom">Nom</label>
                <input type="text" name="nom" id="nom"  >
            </div>
            <div>
                <label for="email" id="labelEmail">Email *</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div>
                <label for="message" id="labelMessage">Message *</label>
                <textarea name="message" id="message" cols="5" rows="10"  required></textarea>
            </div>

            <div id="score">

            </div>
            <div>
            <br>
            <p>(*) Ce champ est obligatoire</p>
            <div><br>
            <div id="envoi"></div>
            <input type="submit" value="Envoyer"><br><br>
            </div>
        </form>
        </div>
    </div>
    <h3 id="listMessages">Messages Précédents - Total de messages <?php echo count($messages); ?></h3>
    <div id="allMessages">
        <?php
        foreach ($messages as $messages):?>
            <p class="post1"><?= $messages["firstname"]?> a envoyé ce message le <?=(new DateTime($messages["datemessage"]))->format('d/m/Y H:i:s')?><br><?= $messages["message"]?></p><br>
        <?php endforeach;
        ?>
        <?php
        if(isset($pagination)):
        ?>
            <div class="pagination"><?=$pagination?></div>
        <?php
    
    endif;
        ?>
    </div>
<script src="js/validation.js"></script>
</body>
</html>

    