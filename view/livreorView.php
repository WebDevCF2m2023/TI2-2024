<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Livre d'or</title>
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
                <img onclick="togglePassword(event)" id="btnShowPassword" src="images/eye-open.svg" alt="Voir le mot de passe" title="Voir le mot de passe">
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

            <?php
            foreach(array_reverse($informations) as $information):
            ?>
                <div class="information">
                <div>
                    <p><?=$information["themail"]?></p>
                    <p><?=(new DateTime($information["thedate"]))->format("d/m/Y H:i:s")?></p>
                </div>
                <p><?=$information["themessage"]?></p>
            </div>
            <?php
            endforeach;
            ?>
        </section>

    </main>
    <footer>

    </footer>
    <script src="js/livredor.js"></script>
</body>
</html>