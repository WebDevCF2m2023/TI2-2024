function verif(){
    const errorPassword = document.querySelector("#error-password");
    const errorNom = document.querySelector("#error-nom");
    const errorEmail = document.querySelector("#error-email");
    const errorTheMessage = document.querySelector("#error-themessage");

    errorEmail.style.display = "none";
    errorNom.style.display = "none";
    errorPassword.style.display = "none";
    errorTheMessage.style.display = "none";
    
    const nom = document.querySelector("#nom").value;
    const email = document.querySelector("#email").value;
    const theMessage = document.querySelector("#themessage").value;

    const validNom = nom.length >= 5;
    const validTheMessage = theMessage.trim().length > 0;

    
    var messageAlerte = "Bienvenue " + prenom + " " + nom + " !";
    if (prenom.length <= 100 && nom.length <= 100 && message.length <= 600 && /[@]/.test(email)&& /[.]/.test(email)) {
        alert(messageAlerte);
        
        return true;
    }


     let check = true;

    if(!validEmail){
        errorEmail.style.display = "block";
        console.log ("email valide");
        check = false;
    }
    if(!validPassword){
        errorPassword.style.display = "block";
        console.log ("password valide");
        check = false;
    }
    if(!validNom){
        errorNom.style.display = "block";
        console.log ("nom valide");
        check = false;
    }
    if(!validTheMessage){
        errorTheMessage.style.display = "block";
        console.log ("message valide");
        check = false;
    }

    // Si il est true, on actualise la page en validant le formulaire
    // Si il est false, on n'actualise PAS la page et on ne valide PAS le formulaire
    return check;

}