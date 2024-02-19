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
    <header>
        <h1>LIVRE D'OR</h1>
    </header>
    <main>
        <?php if(isset($success)): ?>
        <p><?=$success ? "Votre message a bien été enregistré" : "Une erreur s'est produite" ?></p>
        <?php endif; ?>

        <form action="" method="POST" onsubmit="return verif()">
            <p id="error-password" class="error">
            <div>
                <label for="password">Password : </label>
                <input type="password" name="thepassword" id="password" required>
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
            <textarea name="themessage" id="themessage" maxlength="2050" required></textarea>
            <div>
                <input type="submit" value="Envoyer">
            </div>
        </form>
</body>
</html>
    <script src="js/livredor.js"></script>

    
</body>
</html>