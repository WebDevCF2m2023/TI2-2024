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
    <h1 id="firstTitle">Livre d'or</h1>
<div id='superior'>
<div id ="logo">
<img src="../img/shichan.png" alt="form">
</div>

<form action="./" method="POST" id="myForm">

   <h2 class="leave">Laissez-nous un message</h2>
   
   <div id="leprenom"><label class="prenom"for="firstname">Prénom*</label>                        
   <input type="text" id="lePrenom" name="firstname" required /></div>    

   <div id="lenom"><label class="nom" for="lastname">Nom</label>
   <input type="text" id="leNom" name="lastname" /></div>

   <div id="lemail"><label class="mail" for="usermail">E-mail*</label>
       <input type="text" id="eMail" name="usermail" required /></div>

    <div id="lemessage">
        <label for="message">Message*</label>
        <textarea name="message" id="msg" cols="30" rows="5" maxlength="600"></textarea> </div>
        <p class="champ">(*)Champ obligatoire.</p>

        <div id="result"></div>
           
       
       <input type="submit" value="Envoyer" id="subButton">



</div>


</br>

</form>

<h2 class='last'>Commentaires précédents</h2>

<h3 id="nbMessage">Il y a <span><?= $nbComments?></span> commentaires</h3>
      <?php
            if (isset($pagination)) echo "<p>$pagination</p>";
            ?>

<section id="comments">
        <?php 
            foreach(array_reverse($viewComments) as $add):
                
        ?>
        <div class="messages">
            <div>
                <p><?= $add["firstname"] ?></p>
                <p><?=(new DateTime($add["datemessage"]))->format('d-m-Y à H\hi')?></p>
            </div>
            <p><?= wordwrap($add["message"], 100, "\r\n", true ) ?></p>
        </div>
        <?php
            endforeach;
        ?>
    </section>


<script src="js/validation.js"></script>
</body>
</html>
