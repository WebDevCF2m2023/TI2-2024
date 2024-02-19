const message = document.querySelector("#message");
const nom = document.querySelector("#nom");
const prenom = document.querySelector("#prenom");
const email = document.querySelector("#email");

const messageError = document.querySelector("#message-error");
const nomError = document.querySelector("#nom-error");
const prenomError = document.querySelector("#prenom-error");
const emailError = document.querySelector("#email-error");

function validateForm(){

    messageError.style.display = "none";
    nomError.style.display = "none";
    prenomError.style.display = "none";
    emailError.style.display = "none";

    let checkOK = true;
    if(nom.value.trim().length !== 0 && (nom.value.trim().length < 4 || nom.value.trim().length > 100)){
        checkOK = false;
        nomError.style.display = "block";
    }
    if(prenom.value.trim().length < 4 || prenom.value.trim().length > 100){
        checkOK = false;
        prenomError.style.display = "block";
    }
    if(message.value.trim().length == 0 || message.value.trim().length > 600){
        checkOK = false;
        messageError.style.display = "block";
    }
    if(!/@.*\./.test(email.value)){
        checkOK = false;
        emailError.style.display = "block";
    }
    // Si true, le formulaire s'envoie
    // Si false, le formulaire ne s'envoie pas
    if(checkOK) alert(`Bienvenue ${prenom.value} ${nom.value}`);
    return checkOK;
}