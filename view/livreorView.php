<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
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
        <img src="img/email.png" alt="">
            <fieldset>
                <h2>Laissez-nous un message</h2>
                <p id="error-nom" class="error">* Le prenom et le nom doit faire au moins 5 caractères</p>
                <div>
                    <label for="prenom">prenom * </label>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div>
                    <label for="nom">Nom : </label>
                    <input type="text" name="lastname" id="lastname" required>
                </div>

            <p id="error-email" class="error">* L'email doit avoir un @ et un .</p>
            <div>
                <label for="email">Votre email *</label>
                <input type="email" name="usermail" id="usermail" required>
            </div>
            <p>* Le message ne doit pas être vide</p>
            <label for="message" id="msg">Message *</label>
            <textarea name="message" id="message" maxlength="2050" required></textarea>
            <div>
                <input type="submit" value="Envoyer" id="sub">
            </div>
        </form>
        </fieldset>
        <section id="livreor">
        <?php
            foreach ($informations as $information){
            ?>
            <div id="BlockMessage">
                <div class="com" id="comm">
                <h4><?= $information['firstname'] ?> a envoyé ce message le <?= (new DateTime($information['datemessage']))->format('d-m-Y à H\hi') ?></h4>
            <p> :    <?=wordwrap($information['message'],100,"\n",true)?></p></div></div>
            <?php
            }
            /*endforeach;*/
            ?>
        </section>
        <?php
    if(isset($pagination)) echo "$pagination<hr>";
    ?>

    </main>
    <footer>

    </footer>
    <script src="js/livreor.js"></script>
</body>
</html>
