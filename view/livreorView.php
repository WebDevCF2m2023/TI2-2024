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
    <h1>TI2 | Livre d'or</h1>
<script src="js/validation.js"></script>
</body>

<form action="" method="get" name="test">
        <fieldset>
            <label>Prenom : </label>
            <input type="text" placeholder="" name="Prenom" id="nom" required>
            <br>
            <label>Nom : </label>
            <input type="text" placeholder="" name="nom" id="nom" required>
            <br>
            <label for="email">Adresse mail</label>
            <input type="text" name="email" id="" required>
            <br>
            <label>Message</label>
            <input type="text" name="message" id="" required>
        </fieldset>
        
        <button onclick = CheckPassword()>Envoyez les données</button>
    </form>
</html>
