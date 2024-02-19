<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Form</title>
</head>
<body>
    <form action="" onsubmit="return verif(event)">
        <p id="error" class="error">* completer les champs</p>
        <div>
            <label for="nom">Votre email :</label>
            <input type="email" name="email" id="mail" min="0" max="120">
        </div>
        <input type="submit" value="Confirmer">
    </form>
    <script src="js/livreor.js"></script>
</body>
</html>