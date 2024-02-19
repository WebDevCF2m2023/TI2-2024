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

<?php
include "livreorModel.php";

var_dump($_GET, $_POST);
?>
<!-- Page content-->
<div class="container">
    <div class="text-center mt-5">
        <h1>Group2ti2exemple | Livre d'or</h1>
        <p class="lead">Laisser moi votre avis sur mes travaux</p>
    </div>
    <div>
        <?php
        if (isset($message)) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
            <?php
        }
        ?>
    </div>


    <div class="col-8 offset-2">
        <?php
        foreach ($comments as $commentaire) {
            ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $commentaire['date_heure']; ?> | <?php echo $commentaire['titre']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $commentaire['nom']; ?></h5>
                    <p class="card-text"><?php echo $commentaire['texte']; ?></p>
                </div>
            </div>
            <?php
        }
        ?>

    <fieldset class="blue">
    <form action="" method="POST" name="or" id="form">
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
        
            <button type="submit" onclick = checking()>Envoyez les données</button>
    </form>
</html>
