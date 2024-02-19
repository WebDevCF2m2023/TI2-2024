

function formVerify() {
    let message = document.querySelector("#form-message").value;
    let prenom = document.querySelector("#form-prenom").value;
    let nom = document.querySelector("#form-nom").value;
    let mail = document.querySelector("#form-mail").value;


    var messageLengthCheck = message.length <= 600;
    var prenomLengthCheck = prenom.length <= 100;
    var nomLengthCheck = nom.length <= 100;

    var re = /\S+@\S+\.\S+/;
    var mailCheck = re.test(mail);
    
    if (messageLengthCheck == false) {
        displayHelper("red", "Le message ne peut pas contenir plus de 600 caractères");
        return false;
    } else if (prenomLengthCheck == false) {
        displayHelper("red", "Le prenom ne peut pas contenir plus de 100 caractères");
        return false;
    } else if (nomLengthCheck == false) {
        displayHelper("red", "Le nom ne peut pas contenir plus de 100 caractères");
        return false;
    } else if (mailCheck == false) {
        displayHelper("red", "Le mail doit contenir un '@'");
        return false;
    } else {
        displayHelper("green", "Bienvenue " + prenom + " " + nom + " !");

        return true
    }
    
    
}



function displayHelper(color, message){
    let helper = document.querySelector("#helper");
    helper.style.display = "block";
    helper.style.color = color;
    helper.innerHTML = message;

}

let form = document.querySelector("#form");

form.addEventListener('submit', function(event) {
    event.preventDefault();
    let checkVerify = formVerify();

    
    if (checkVerify == true) {
        event.preventDefault();
        setTimeout(function() {
            form.submit();
        }, 4000);
    } else {
        event.preventDefault();
    }

}); 