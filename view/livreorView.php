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
<<<<<<< HEAD
    <header>
        <h1>Livre d'or</h1>
    </header>
    <main id="livreor">
        <section id="Section1">
=======
    <h1>TI2 | Livre d'or</h1>
    <div id="pic">
        <img id="img" src="img/email.png" alt="">
    </div>
    <form id="form1" action="" method="post">
        <div id="lenght">
            <h1>laissez nous un message</h1>
            <div id="lenom">
                <label for="nom">Nom*</label>
                <input type="text" placeholder="nom" name="lastname" id="firstname" required>
            </div>
            <div id="leprenom">
                <label for="prenom">Prénom</label>
                <input type="text" placeholder="prénom" name="firstname" id="lastname">
            </div>
            <div id="mail">
                <label for="email">Email* :</label>
                <input type="email" placeholder="votre e-mail" id="usermail" name="usermail" required >
            </div>
            <div id="lemessage">
                <label for="msg">Message*</label>
                <textarea name="message" placeholder="votre message" id="message" cols="30" rows="5" maxlength="600" required></textarea>
            </div>
           <h4>(*) Ce champs est obligatoire </h4>
           <button type="submit" id="subButton" onclick="return validateForm(event)">Envoyer</button> 
        </div>
    </form>
    <h1>message précédent</h1>
    <section id="informations">
        <?php 
            foreach(array_reverse($livreor) as $coms):
        ?>
        <div class="information">
>>>>>>> c218836432b81a35efc369ef855b4a76896caea7
            <div>
                <img src="img/formulairesweb-removebg-preview.png" alt="Image Email" width="400">
            </div>
            <div id="block">
                <form action="" method="POST">
                    <h3>Laissez-nous un message</h3>

                    <p id="prenom-error" class="error">* Le prénom doit avoir minimum 4 caractère et maximum 100.</p>
                    <p id="nom-error" class="error">* Le nom doit avoir minimum 4 caractère et maximum 100.</p>
                    <p id="email-error" class="error">* L'email n'est pas valide.</p>
                    <p id="message-error" class="error">* Le message ne peut pas être vide et ne doit pas dépasser 600 caractère</p>
                    <div>
                        <label for="prenom">Prénom *</label>
                        <input type="text" name="prenom" id="prenom">
                    </div>
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom">
                    </div>
                    <div>
                        <label for="email">E-mail *</label>
                        <input type="email" name="email" id="email" >
                    </div>
                    <div>
                        <label for="message">Message *</label>
                        <textarea name="message" id="message" maxlength="600" ></textarea>
                    </div>
                    <p id="obligatoire">(*) Ce champ est obligatoire</p>
                    <div id="Submit">
                    <button class="btn-donate" type="submit" id="subButton" onclick="return validateForm(event)">Envoyer</button> 
                    </div>
                    <h3><?php if (empty($livreor)) echo "Pas encore de message" ?></h3>
                    <h3>Il y a <?= $nbInformations ?> messages écrits</h3>
                </form>
            </div>
        </section>
        <?php
        if(isset($pagination)):
        ?>
            <div class="pagination"><?=$pagination?></div>
        <?php
        endif;
        ?>
        <section>
            <?php foreach(array_reverse($livreor) as $coms): ?>
            <div class="comment">
                <p><span class="name"><?=$coms["firstname"]?></span> a envoyé ce message le <?=(new DateTime($coms["datemessage"]))->format("d-m-Y à H\hi")?></p>
                <p><span id="usercoms"><?=str_replace("\n", "<br>", $coms["message"])?></span></p>
            </div>
            <?php endforeach; ?>
        </section>
        <?php
        if(isset($pagination)):
        ?>
            <div class="pagination"><?=$pagination?></div>
        <?php
        endif;
        ?>
    </main>
    <script src="js/validation.js"></script>
</body>
</html>