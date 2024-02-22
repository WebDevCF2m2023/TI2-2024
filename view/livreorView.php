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
    <?php 
                        if (isset($success)) {
                            if ($success === true) {
                                echo '<img id="alien" src="img/istockphoto-1173828830-612x612-removebg-preview-removebg-preview(1).png" alt="" > </div>';
                            } else {
                                echo '<div class="message" >'.$message.'</div>';
                            }
                        }
                    ?>
        <section id="Section1">
            <div>
                <img id="pic" src="img/_124063425_alienwithletter-removebg-preview.png" alt="Image Email">
            </div>
            <div id="block">
                <form id="myForm" action="" method="POST">
                    <h3>Laissez-nous un message</h3>
                    <?php 
                        if (isset($success)) {
                            if ($success === true) {
                                echo '<div class="message" id="welkom" >Bienvenu sur mon site '.$firstname.' '.$lastname.' </div>';
                            } else {
                                echo '<div class="message" >'.$message.'</div>';
                            }
                        }
                    ?>
                    <p id="prenom-error" class="error">* Le prénom doit avoir minimum 4 caractère et maximum 100.</p>
                    <p id="nom-error" class="error">* Le nom doit avoir minimum 4 caractère et maximum 100.</p>
                    <p id="email-error" class="error">* L'email n'est pas valide.</p>
                    <p id="message-error" class="error">* Le message ne peut pas être vide et ne doit pas dépasser 600 caractère</p>
                    <div>
                        <label id="prenomColor" for="prenom">Prenom *</label>
                        <input type="text" placeholder="votre Prenom :" name="prenom" id="prenom" oninput="changeColor(this.id, this.value)" required>
                    </div>
                    <div>
                        <label id="nomColor" for="nom">Nom</label>
                        <input type="text" placeholder="Votre Nom :" name="nom" id="nom" >
                    </div>
                    <div>
                        <label id="mailColor" for="email">E-mail *</label>
                        <input type="email" placeholder="Votre email :" name="email" id="email" oninput="changeColor(this.id, this.value)" required >
                    </div>
                    <div>
                        <label id="messageColor" for="message">Message *</label>
                        <textarea name="message" placeholder="Votre text :" id="message" maxlength="600" oninput="changeColor(this.id, this.value)" required></textarea>
                    </div>
                    <p id="obligatoire">(*) Ce champ est obligatoire</p>
                    <div id="Submit">
                    <button class="btn-donate" type="submit" id="subButton" value="submit" onclick="return validateForm(event)">Envoyer</button> 
                    </div>
                    <h3><?php if (empty($livreor)) echo "Pas encore de message" ?></h3>
                    <h3>Il y a <?= $nbInformations ?> messages écrits</h3>
                    <?php 
                        if (isset($success)) {
                            if ($success === true) {
                                echo '<div class="message" id="messageEnregistre">Le message a été enregistré avec succès.</div>';
                            } else {
                                echo '<div class="message" id="messageNonEnregistre">Le message n\'a pas été enregistré.</div>';
                            }
                        }
                    ?>
                </form>
            </div>
        </section>

        <?php
        if (isset($success) && $success === true):
        if(isset($pagination)):
        ?>
            <div class="pagination"><?=$pagination?></div>
        <?php
        endif;
        ?>
        <section>
            <?php foreach($livreor as $coms): ?>
            <div class="comment">
                <p><span class="name"><?=$coms["firstname"]?></span> a envoyé ce message le <?=(new DateTime($coms["datemessage"]))->format("d-m-Y à H\hi")?></p><hr>
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
    endif;
        ?>
    </main>
    <script src="js/validation.js"></script>
</body>
</html>