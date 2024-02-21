
function check(){
    const form = document.querySelector(".form");
    const prenom = document.querySelector("#prenom").value;
    const nom = document.querySelector("#nom").value;
    const username = document.querySelector("#username").value;
    const message = document.querySelector("#message").value;

    const insert = document.querySelector("#insertmessage");

    if(nom.length > 5 || prenom.length > 5) {
        alert("Votre nom ou prénom est long");
        return false;       
    }else if(!/[@]/.test(username)){
        alert("Votre mail doit avoir '@'");
        return false;
    }else if(!/[.]/.test(username)){
        alert("Votre mail doit avoir '.'");
        return false;
    }else if(message.length > 600){
        alert("Votre message doit avoir maximum 600 caractères");
        return false;
    }else {
        alert("Bienvenue " + prenom +" "+ nom);
        insert.textContent = "Message registered";
        insert.style.color = "green";
        insert.style.display = 'block';
        insert.style.textAlign = "center";
        return true;
    }
}
