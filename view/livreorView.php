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
    <header>
        <p id="screenwidth"></p>
        <h1>Livre d'or</h1>
        <img src="/img/email.png" alt="emailImage" id="emailImg">
    </header>
    <div class="myFormDiv">
        <form action="" id="myForm">
            <h2 id="myFormHead">Laissez-nous un message</h2>
            <div id="firstName" class="inputDiv">
                <label for="prenomInput" id = "prenomLabel">Prénom *</label><input type="text" name="prenomInput" id="prenomInput">
            </div>
            <div id="lastName" class="inputDiv">
                <label for="nomInput" id="nomLabel">Nom</label><input type="text" name="nomInput" id="nomInput">
            </div>
            <div id="email" class="inputDiv">
                <label for="emailInput" id="emailLabel">E-mail *</label><input type="text" name="emailInput" id="emailInput">
            </div>
            <div class="inputDiv">
                <label for="yourMessage" id="messageLabel">Message *</label>
            <textarea name="yourMessage" class="inputDiv" id="yourMessageInput" cols="30" rows="10"></textarea>
            </div>
            <div class="inputDiv">
                <button id="sendButton" class="sendBut">Envoyer</button>
            </div>
        </form>
    </div>

    <div class="prevMessages">
        <h3 id="prevMessHead">Messages précedents</h3>
        <div class="messageHolder">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat obcaecati perspiciatis quibusdam, consequuntur eaque veniam necessitatibus facere recusandae ipsum provident natus in nisi sint sapiente nam. Harum, odio! Nemo repellendus vero molestias tenetur? Odio eius totam similique iusto dolorem maiores, ipsum libero nihil temporibus impedit ullam, vitae ea adipisci reprehenderit recusandae ipsam quasi doloribus? Ducimus aspernatur laboriosam maxime nisi itaque id, iure repudiandae tempore doloremque minus dolores alias mollitia voluptate nobis? Sapiente, explicabo recusandae. Provident facere earum eum ab, placeat nostrum illo ad numquam accusantium dignissimos voluptatum ipsa dolorum eveniet non dolore, hic sit totam? Labore mollitia enim maiores eos.</div>
    </div>
<script src="js/validation.js"></script>
</body>
</html>


<!-- RGB 66 124 160