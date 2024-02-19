function control () {
    const form = document.querySelector(".form");
    const prenom = document.querySelector("#prenom").value;
    const nom = document.querySelector("#nom").value;
    const username = document.querySelector("#username").value;
    const message = document.querySelector("#message").value;

    form.addEventListener('submit', function(event) {  
        event.preventDefault();});

    if(nom.length > 100 || prenom.length > 100) {
        alert("Votre nom ou prénom est long");
       
    }else if(!/[@.]/.test(username)){
        alert("Votre mail doit avoir @ et .");
    }else if(username.length > 600){
        alert("Votre message doit avoir maximum 600 caractères");
    }
}