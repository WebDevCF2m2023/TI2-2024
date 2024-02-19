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
        <h1>Livre d'or</h1>
    </header>
    <main id="livreor">
        <section id="formSection">
            <div>
                <img src="img/email.png" alt="Image Email" width="300px">
            </div>
            <div>
                <form action="" method="POST">
                    <h3>Laissez-nous un message</h3>
                    <p id="information-message">Le message a bien été envoyé</p>
                    <div id="firstDivForm">
                        <label for="prenom">Prénom *</label>
                        <input type="text" name="prenom" id="prenom">
                    </div>
                    <div>
                        <label for="nom">Nom *</label>
                        <input type="text" name="nom" id="nom">
                    </div>
                    <div>
                        <label for="email">E-mail *</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="message">Message *</label>
                        <textarea name="message" id="message"></textarea>
                    </div>
                    <p id="tips">(*) Ce champ est obligatoire</p>
                    <div id="containerSubmit">
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
            </div>
        </section>
        <section>
            <h2>Message précedents</h2>
            <div class="comment">
                <p><span class="name">Lorem</span> a envoyé ce message le 01-02-2023 à 09h12</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus distinctio fugit laborum veritatis in amet ea eum. Illum, exercitationem quam qui repellendus ad nobis, beatae adipisci blanditiis autem facilis assumenda.</p>
            </div>
        </section>
    </main>
    <footer>

    </footer>
    <script src="js/validation.js"></script>
</body>
</html>
