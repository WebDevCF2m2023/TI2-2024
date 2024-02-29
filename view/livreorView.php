<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Expires" content="0">
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
                <img src="img/email.png" alt="Image Email" width="300">
            </div>
            <div>
                <form action="?p=1" method="POST" onsubmit="return validateForm()">
                    <h3>Laissez-nous un message</h3>
                    <?php 
                    if(isset($message)){
                        $class = $success !== true ? "error" : "success";
                    }else{
                        $class = "";
                        $message = "";
                    }
                    ?>
                    <p id="information-message" style="<?=$class === "" ? "display: none;" : ""?>" class="<?= $class ?>"><?= $message ?></p>
                    <p id="prenom-error" class="error error-validation">* Le prénom doit avoir minimum 4 caractères et maximum 100.</p>
                    <p id="nom-error" class="error error-validation">* Le nom doit avoir minimum 4 caractères et maximum 100.</p>
                    <p id="email-error" class="error error-validation">* L'email n'est pas valide.</p>
                    <p id="message-error" class="error error-validation">* Le message ne peut pas être vide et ne doit pas dépasser 600 caractères</p>
                    <div>
                        <label for="prenom">Prénom *</label>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom">
                    </div>
                    <div>
                        <label for="email">E-mail *</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="message">Message *</label>
                        <textarea name="message" id="message" required></textarea>
                        <span id="infosLengthMessage">0 / 600</span>
                    </div>
                    <p id="tips">(*) Ce champ est obligatoire</p>
                    <div id="containerSubmit">
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
            </div>
        </section>
        <section>
            <?php
                if($totalComments === 0) $messageNombreMessage = "Pas encore de message";
                else if($totalComments === 1) $messageNombreMessage = "Il y a un message écrit";
                else if($totalComments > 1) $messageNombreMessage = "Il y a $totalComments messages écrits";
            ?>
            <h2>Message<?= $totalComments > 1 ? "s" : "" ?> précédent<?= $totalComments > 1 ? "s" : "" ?> : <?=$messageNombreMessage?></h2>
            <div class="pagination"><?=$pagination/*Si false, echo du vide*/?></div>
            <?php foreach($livreOr as $comment): ?>
            <div class="comment">
                <p><span class="name"><?=htmlspecialchars($comment["firstname"])?></span> a envoyé ce message le <?=(new DateTime($comment["datemessage"]))->format("d-m-Y à H\hi")?></p>
                <p><?=nl2br(htmlspecialchars($comment["message"]))?></p>
            </div>
            <?php endforeach; ?>
            <div class="pagination"><?=$pagination/*Si false, echo du vide*/?></div>
        </section>
    </main>
    <footer>

    </footer>
    <script src="js/validation.js"></script>
</body>
</html>
