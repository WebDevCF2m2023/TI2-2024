<body>
    <h1>Livre d'or</h1>
    <img id="Madame" src="../public/img/email.png" alt="">
 
    <h3><?php if(isset($message))echo $message?></h3>
    <div class="container">
    <h2>Laissez-nous un message </h2>
    <form action=""  name="monForm" method="POST">
   
    <div id="lePrenom">
        <label for="prenom"><strong>Prénom*</strong></label>
        <input type="text" name="firstname" >
    </div>
    <div  id="leNom">
        <label for="nom"><strong>Nom*</strong></label>
        <input name="lastname" type="text"  >
</div>
        <div id="email">
            <label for="mail"><strong>Email*</strong></label>
    <input name="usermail" type="email" placeholder="Votre email" required><br>
</div>
    <div id="themessage">
        <label for="message"><strong>Message*</strong></label>
    <textarea id="TextArea" name="message" placeholder="Votre message" required></textarea><br>
        </div>
        <input type="submit" value="Envoyer mon message">
     </form>
     </div>
     <h4><strong>Message Précédents</strong></h4>
 
            <?php
            foreach($informations as $information):
            ?>
            <div id="BlockMessage">
            <h4>Posté le <?=$information['datemessage']?></h4>
            <p><?=$information['message']?></p>
            <?php
            endforeach;
            ?>
            </div>
       
   
<script src="js/validation.js"></script>
</body>