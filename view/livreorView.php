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
            <p id="error-password" class="error">* Le password doit être/avoir 8 de long / une lettre majuscule / 1 caractère spécial et un chiffre</p>
            <div>
                <label for="password">Password : </label>
                <input type="password" name="thepassword" id="password" required>
            </div>
            <p id="error-nom" class="error">* Le nom doit faire au moins 5 caractère</p>
            <div>
                <label for="nom">Nom : </label>
                <input type="text" name="thenom" id="nom" required>
            </div>
            <p id="error-email" class="error">* L'email doit avoir un @ et un .</p>
            <div>
                <label for="email">Votre email :</label>
                <input type="email" name="themail" id="email" required>
            </div>
            <p id="error-themessage" class="error">* Le message ne doit pas être vide</p>
            <textarea name="themessage" id="themessage" maxlength="2050" required></textarea>
            <div>
                <input type="submit" value="Envoyer">
            </div>
        </form>

        <section id="informations">
</body>
</html>
    <script src="js/livredor.js"></script>
</body>
</html>