<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title> Age</title>
</head>
<body>
    <form action="" onsubmit="return verifAge(event)">
        <p id="error-mineur" class="error">* Tu n'es pas majeur</p>
        <div>
            <label for="age">Votre age :</label>
            <input type="number" name="age" id="age" min="0" max="120">
        </div>
        <input type="submit" value="Confirmer">
    </form>
    <script src="js/formage.js"></script>
</body>
</html>