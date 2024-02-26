
function submitForm(e) {
    var firstName = document.getElementById('prenom').value;
    var lastName = document.getElementById('nom').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var envoi = document.getElementById('envoi');
  
    var messageAlerte = "Bienvenue"+ " " + firstName + " " + lastName + " !";

    envoi.style.textAlign = "center";
    envoi.style.color = "red";
    envoi.style.fontSize= "25px";

    if (firstName.length === 0){
        envoi.textContent = "Veuillez introduire votre prénom";
    }else if (firstName.length >100){
        envoi.textContent = "Maximum 100 characters";
    }else if(message.length >600){
        envoi.textContent = "Maximum 600 characters";
    }else if(message.length === 0){
        envoi.textContent = "Veuillez écrire un message";
    }else if(/\S+@\S+\.\S+/.test(email) == false || /\s/.test(email) == true){
        envoi.textContent = "L'adresse e-mail est invalide";
    }else{
        alert(messageAlerte);
        return true;
    }
   return false;
}
    
    
