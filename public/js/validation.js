
function check(){
    const prenom = document.querySelector("#prenom").value;
    const nom = document.querySelector("#nom").value;
    const username = document.querySelector("#username").value;
    const message = document.querySelector("#message").value;

    if(nom.length > 100) {
        alert("Votre nom doit avoir maximum 100 caractères");      
    }else if(prenom.length > 100) {
        alert("Votre prénom doit avoir maximum 100 caractères");   
    }else if(!/[@]/.test(username)){
        alert("Votre e-mail doit avoir '@'");
    }else if(!/[.]/.test(username)){
        alert("Votre e-mail doit avoir un point '.'");
    }else if(message.length > 600){
        alert("Votre message doit avoir maximum 600 caractères");
    }else if(message.trim().length === 0){
        alert("Il faut remplir la case message");
    }else {
        alert("Bienvenue " + prenom +" "+ nom);
        return true;
    }
    return false;
}