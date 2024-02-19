<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- On se situe dans public car on a fusionné avec index.php qui est dans public -->
    <link rel="stylesheet" href="css/style.css">
    <title>Pagination</title>
</head>
<body>
    <h1>Pagination 😊</h1>
    <?php 
        // On var dump allCountries qui se situe dans index.php
        // Il connait la variable car il a fusionné avec index.php
        //var_dump($allCountries); 

        foreach($allLivreor as $value)
            echo "<p>$value[firstnam]</p>";
    ?>
</body>
</html>