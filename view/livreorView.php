<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TI2 | LIVREoR</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/validation.css">
</head>
<body>
    <h1 class="title">Livre d'or</h1>
    <div class="content-wrapper">
        <div class="main-container">
            <img src="img/email.png" class="image-mail" alt="Image of a woman pointing at a mail">
            <div class="form-container">
                <h2 id="top-form-message">Laissez-nous un message</h2>
                <form action="" id="contact-form" method="post">
                    <div class="form-field">
                        <label for="firstname">Prénom <span class="required-field">*</span></label>
                        <input maxlength="100" type="text" name="firstname" id="Prénom" required>
                    </div>

                    <div class="form-field">
                        <label for="lastname">Nom <span class="required-field">*</span></label>
                        <input maxlength="100" type="text" name="lastname" id="Nom" required>
                    </div>

                    <div class="form-field">
                        <label for="usermail">E-mail <span class="required-field">*</span></label>
                        <input type="text" name="usermail" id="usermail" required>
                    </div>

                    <div class="form-field textarea-field">
                        <label for="message">Votre message <span class="required-field">*</span></label>
                        <textarea rows="6" cols="35" name="message" id="message" required></textarea>
                    </div>

                    <button class="btn-donate" type="submit" id="subButton" onclick="return validateForm(event)">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

    <div class="message-container">
    <?php
// Define the nl2br() function
function custom_nl2br($string) {
    return nl2br($string);
}
$results = getAllLivreOr($db);
echo '<div class="comment-title">Message précédents <span style="font-size: 10px;">Il y a ' . count($results) . ' message(s)</span></div>';
?>
<div class="prevMessages">
    <h3 id="prevMessHead">Messages précédents <?php if (isset($messageCount)) echo $messageCount?></h3>
    <?php foreach ($messages as $mess) : ?>
        <div class="messageHolder">
            <h4><span class="italic"><?= $mess["firstname"] ?></span> à envoyé ce message le <?= $mess["datemessage"] ?></h4>
            <p><?= nl2br($mess["message"]) ?></p>
        </div>
    <?php endforeach; ?>
</div>
?>