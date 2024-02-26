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
</head>

<body>
    <h1 class="title">Livre d'or</h1>

    <div class="content-wrapper">
        <div class="main-container">
            <img src="img/email.png" class="image-mail" alt="Image of a woman pointing at a mail">

            <div class="form-container">
                <!-- Your form fields here -->

                <h2 id="top-form-message">Laissez-nous un message</h2>

                <form action="index.php" id="form" method="POST">

                    <div class="input-group">
                        <label for="form-prenom">Prenom *</label>
                        <input type="text" name="firstname" required id="form-prenom" placeholder="Prenom">
                    </div>

                    <div class="input-group">
                        <label for="form-nom">Nom *</label>
                        <input type="text" name="lastname" required id="form-nom" placeholder="Nom">
                    </div>

                    <div class="input-group">
                        <label for="form-mail">E-mail *</label>
                        <input type="text" name="usermail" required id="form-mail" placeholder="Mail">
                    </div>

                    <div class="input-group">
                        <label for="form-message">Message *</label>
                        <textarea name="message" id="form-message" required
                            placeholder="Ecrivez votre message"></textarea>
                    </div>

                    <h2 id='obligatoire'>(*) Ce champ est obligatoire</h2>
                    <h2 id='helper'>(*) Helper Text</h2>

                    <div class="submit-container">
                        <input type="submit" id="submit-form" value="Envoyer">
                    </div>

                </form>
            </div>

        </div>




        <div class="message-container" style="display: flex; flex-direction: column;">

            <?php
            if (isset($pagination)) {
                echo '<div class="pagination">';
                echo $pagination;
                echo '</div>';
            }
            ?>

            <?php
            $results = getAllLivreOr($db);



            echo '<div class="comment-title">Messages précédents <span style="font-size: 10px;">Il y a ' . count($informationsAll) . ' message(s)</span></div>';

            ?>

            <?php
            if (empty($informations)) {
                echo 'There is nothing in the database.';
            } else {
                foreach ($informations as $commentaire) {
                    echo '<div class="content-message">';
                    echo '<div class="message-header">';
                    echo '' . $commentaire['firstname'] . ' ' . $commentaire['lastname'] . ' a envoyé ce message le ' .
                        date('d-m-Y \à H\hi', strtotime($commentaire['datemessage']));
                    echo '</div>';
                    echo '<div class="message-body">';
                    echo nl2br($commentaire['message']);
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>

        </div>
    </div>


    <script src=" js/validation.js">
    </script>
</body>

</html>