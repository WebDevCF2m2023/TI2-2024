<!DOCTYPE html>
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

    <header>
        <h1>LIVRE D'OR</h1>
    </header>
     <img src="img/email.png" alt="fig1">
    <main>

        <?php
        if (isset($message)) :
        ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form action="" method="POST" onsubmit="return submitForm()">
            <div>
                <h2>Laisse-nous un message</h2>
                <label for="password">Prénom : </label>
                <input type="text" name="thepassword" id="password" required>
            </div>
            <p id="error-nom" class="error"></p>
            <div>
                <label for="nom">Nom : </label>
                <input type="text" name="thenom" id="nom" required>
            </div>
            <p id="error-email" class="error"></p>
            <div>
                <label for="email">Votre email :</label>
                <input type="email" name="themail" id="email" required>
            </div>
            <p id="error-themessage" class="error"></p>
            <label for="message">Message : </label>
            <textarea name="themessage" id="themessage" maxlength="2050" required></textarea>
            <div>
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </main>

    <h3>Message<?=$nbInformations > 1 ? "s" : ""?> Précédent<?=$nbInformations > 1 ? "s" : ""?> : <?php

        if($nbInformations > 1){
            $m = "Il y a $nbInformations messages écrits.";
        }else if($nbInformations == 1){
            $m = "Il y a 1 message écrit.";
        }else {
            $m = "Pas encore de message";
        }
    
        echo $m;
    ?></h3>
    
    <?php
        if (isset($pagination)) echo "<p>$pagination</p>";
    ?>

    <?php
    
    foreach ($informations as $commentaire) :
    ?>

        <div class="commentaires">
            <h4><?= $commentaire['firstname'] ?> a envoyé ce message le <?= $commentaire['datemessage'] ?></h4>
            <p><?= $commentaire['message'] ?></p>
        </div>
    <?php
    endforeach;


    // var_dump($_POST);
    ?>

    <script src="/js/validation.js"></script>
</body>

</html>