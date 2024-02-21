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
    <img src="img\email.png"  >

    
    <form action="" method="post" name="formulaire">
        
        
        <h2>Laissez-nous un message</h2>
        <?php if (!empty($submit_message)):?>
            <p class="<?=$submit_status?>" id="submit-message"><?=$submit_message?></p>
            <?php endif;?>
            <label for="firstname">Prénom* </label>
            <input type="text" placeholder="votre prenom" name="firstname" id="firstname" required><br>
            <label for="lastname">Nom </label>
            <input type="text" placeholder="votre nom" name="lastname" id="lastname"><br>
            <label for="usermail">Email*</label>
            <input type="email" placeholder="votre mail" name="usermail" id="usermail" required><br>
            <label for="message">Message*</label><br>
            <textarea id="message" name="message" rows="6" cols="40" maxlength="" required></textarea><br>
            <span class="error" aria-live="polite"></span>
            <h3>(*) Ce champ est obligatoire</h3>
            <input type="submit" onclick="valideForm()" value="Envoyer" >
        </form>
            <div class="error"></div>
        <h4>Messages précédents</h4>
        <div id="nbMessages">Il y a <?=$totalComments?> messages écrits.</div>
        <div id="pagination"> <?=$pagination ?? null?></div>
	    

        <div id="messages">
            
            <?php foreach($informations as $information):?>
                <div class="message">
                    <h5><?=$information['firstname']?> <?=$information['lastname']?> a envoyé ce message le <?=$information['datemessage']?></h5>
                    <p><?=nl2br($information['message'])?></p>
                    
                </div>
                <?php endforeach?>
            </div>
            
            
            
            <script src="js/validation.js"></script>
        </body>
        </html>