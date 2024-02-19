<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>TI2 | Livre d'or</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/validation.css">
</head>
<body>
    <header>
    <h1>TI2 | Livre d'or</h1>
</header>
<figure>
  <img
    src="/public/img/email.png"
    alt=""
    width="400"
    height="341" />

</figure>
    
    
</div>
<p>Laissez-nous un message</p>
    <form action="" method="post">
        <div id="colonne_gauche">
<div id="lenom">
        <label for="">Nom*</label>
        <input type="text" name="nom" id="nom">
</div>
<div id="leprenom">
        <label for="">Prénom*</label>
        <input type="text" name="prenom" id="prenom">
</div>
<form action="?" method="POST">
  <label for="email">Votre email*</label>
  <input type="email" id="email" name="email" placeholder="your-email@site.com" required>
  <button type="submit">Envoyer</button>
  <label for="message">message*</label>
  <input type="message" id="message" name="message" placeholder="Message" required>
  <textarea name="msg" id="msg" cols="100" rows="10"
    maxlength="1024"></textarea>
    <p1>*Ce champs est obligatoire</p1>
  <button type="submit">Envoyer</button>
</form>
    


<script src="js/validation.js">
    function verif(){
        const errorNom = document.querySelector("#error-nom");
        const errorPrenom = document.querySelector("#error-prenom");
        const errorEmail = document.querySelector("#error-email");
        const errorTheMessage = document.querySelector("#error-themessage");
        const nom = document.querySelector("#nom").value;
        const prenom = document.querySelector("#prenom").value;
        const email = document.querySelector("#email").value;
        const themessage = document.querySelector("#themessage").value;

        const validNom = nom.length > 5;
        const validePrenom = prenom.length > 5;
        const validEmail = /@/.test(email)&& /\./test(email);
        
    }
</script>
</body>
</html>
