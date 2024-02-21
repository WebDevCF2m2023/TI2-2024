function checkFistName() {
    var firstName = document.getElementById('#prenom').value;
    var lastName = document.getElementById('#prenom').value;
    var email = document.getElementById('#email').value;

    var validFirstName = firstName.length <= 100;
    var validLastName = lastName.length <= 100;
    var validEmail = /@/.test(email) && /\./.test(email);
    
    if (validFirstName == false || validLastName == false || validEmail == false){
        errorEmail.style.display =  "block";
        return false;
    }
}

function submitForm(e) {
    var firstName = document.getElementById('prenom').value;
    var lastName = document.getElementById('nom').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var envoi = document.getElementById("envoi");
    
    var messageAlerte = "Bienvenue"+ " " + firstName + " " + lastName + " !";


    if (firstName.length <= 100 && firstName.length != 0 &&  message.length <=600 && lastName.length <=100 && /@/.test(email) && /\./.test(email)) {
        alert(messageAlerte);
        return true;
    } else {
        envoi.textContent = "Veuillez remplir tous les critères";
        envoi.style.textAlign = "center";
        envoi.style.color = "red";
        envoi.styles.fontSize= "25px";
        return false;
    }
   
}