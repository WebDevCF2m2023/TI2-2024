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

<form action="" method="POST">
    <div id="colonne_gauche">        
    <div id="lenom">
        <label for="nom">Nom*</label>
        <input type="text" name="nom" id="nom" required>
    </div>
    <div id="leprenom">
        <label for="prenom">Prénom*</label>
        <input type="text" name="prenom" id="prenom" required>
    </div>
    <div>
        <label for="email">Votre email*</label>
        <input type="email" id="email" name="email" placeholder="your-email@site.com" required>
    </div>
    <div>
        <label for="message">Votre message*</label>
        <textarea id="message" name="message" required></textarea>
    </div>
    <p>*Ce champs est obligatoire</p>
    <button onclick= window.location.href = "https://2023.webdev-cf2m.be/Laura/prefo"  type="submit">Envoyer</button>
</form>
<button onclick =window.location.href = 'https://2023.webdev-cf2m.be/Laura/prefo';>Cliquez Ici</button>

<div class="msg"> 
    <h2>Message pécédents</h2>
    <h4>Lorem</h4>
    <p>ipsum dolor sit amet consectetur, adipisicing elit. Ad est impedit sequi recusandae labore voluptas placeat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, sint? Minima sed in facilis. Natus totam aliquam velit facere veniam. Tenetur quo itaque ut deleniti tempore iste quas, est Expedita rem fugit asperiores molestias aut totam, sed veniam quisquam iure facilis labore impedit?</p>
</div>

<div class="msg">
    <h4>ipsum</h4>
    <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, sint? Minima sed in facilis. Natus totam aliquam velit facere veniam. Tenetur quo itaque ut deleniti tempore iste quas, est Lorem ipsum, dolor sit amet consectetur adipisicing elit. In, sint? Minima sed in facilis. Natus totam aliquam velit facere veniam. Tenetur quo itaque ut deleniti tempore iste quas, est</p> 
</div>


<?php
//message de confirmation de l'envoi
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email']) || !isset($_POST['message'])) {
    $message_formulaire_invalide = "Vérifiez que tout sois remplis";
}
// Messages d'erreur de l'envoi
$message_erreur_formulaire = "envoyer le formulaire";


echo '<p>'.$message_erreur_formulaire.'</p>';
/*var_dump(isset($_POST['nom']));
var_dump(isset($_POST['prenom']));
var_dump(isset($_POST['email']));
var_dump(isset($_POST['message']));*/

?>
<script src="js/validation.js">
    //direction vers le nom, le prenom, l'email, le message
    function verif(){
        const errorNom = document.querySelector("#error-nom");
        const errorPrenom = document.querySelector("#error-prenom");
        const errorEmail = document.querySelector("#error-email");
        const errorTheMessage = document.querySelector("#error-message");
        const nom = document.querySelector("#nom").value;
        const prenom = document.querySelector("#prenom").value;
        const email = document.querySelector("#email").value;
        const themessage = document.querySelector("#message").value;

        const validNom = nom.length > 5;
        const validePrenom = prenom.length > 5;
        const validEmail = /@/.test(email)&& /\./test(email);
        
        function check(){
             var message;
             nbr = Number(document.getElementById("msg").value);
             if(lettre < 200)
             {
                //redirection vers mon site
                //popup sur le message ligne de texte
                alert("pas assez de texte");
            }
            else
            {
                alert("Vous pouvez passez");
            }
        }
    }
    </script>
    
</body>
</html>
