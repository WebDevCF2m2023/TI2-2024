
function check(){
    const form = document.querySelector(".form");
    const prenom = document.querySelector("#prenom").value;
    const nom = document.querySelector("#nom").value;
    const username = document.querySelector("#username").value;
    const message = document.querySelector("#message").value;
    const insert = document.querySelector("#insertmessage");

    if(nom.length > 100) {
        alert("Votre nom est long");      
    }else if(prenom.length > 100) {
        alert("Votre prénom est long");   
    }else if(!/[@]/.test(username)){
        alert("Votre mail doit avoir '@'");
    }else if(!/[.]/.test(username)){
        alert("Votre mail doit avoir '.'");
    }else if(message.length > 600){
        alert("Votre message doit avoir maximum 600 caractères");
    }else if(message.trim().length === 0){
        alert("Vous pouvez pas remplir le section message");
    }else {
        alert("Bienvenue " + prenom +" "+ nom);
        return true;
    }
    return false;
}