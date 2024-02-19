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
    <section>

<?php
foreach(array_reverse($livreor) as $livreors):
?>
    <div class="information">
    <div>
        <p><?=$livreors["usermail"]?></p>
        <p><?=(new DateTime($livreors["datemessage"]))->format("d/m/Y H:i:s")?></p>
    </div>
    <p><?=$livreors["message"]?></p>
</div>
<?php
endforeach;
?>
</section>
<script src="js/validation.js"></script>
</body>
</html>
