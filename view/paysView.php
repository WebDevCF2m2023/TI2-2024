<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Pays</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Liste des Pays</h1>
    <table>
        <!--primier ligne -->
        <tr>
            <th>Nom du Pays</th>
            <th>Code ISO</th>
            <th>Population</th>
            <th>Superficie</th>
            <th>Continant</th>
            <th>Capitale</th>
            <th>Population de la Capitale</th>
            <th>Altitude de la Capitale</th>
        </tr>
        <!--eme ligne -->
        <?php
         foreach($countries as $country){
        ?>
        <tr>
            <td class="nomPays"><?= $country['nom'];?></td>
            <td class="codeIso"><?= $country['iso'];?></td>
            <td class="population"><?= $country['population'];?></td>
            <td class="superficie"><?= $country['superficie'];?></td>
            <td class="continent"><?= $country['continent'];?></td>
            <td class="capitale"><?= $country['capitale'];?></td>
            <td class="popuCap"><?= $country['popu_cap'];?></td>
            <td class="altitude"><?= $country['altitude'];?></td>
        </tr>
        <?php 
         }
        ?> 
    </table>
    <footer>
        <p>&copy; 2024 - Projet SQL-PHP - Tous droits</p>
    </footer>
</body>
</html>
