function verifAge(event){
    const age = document.querySelector("#age").value;
    if(age <= 20){
        document.querySelector("#error-mineur").style.display = "block";
        // alert("Tu n'es pas majeur");
        return false; // Lui est comme notre else, il stop le code ici
    }

    // Redirection si l'age est correct
    window.location.href = "/?p=livredor&age=" + age;

    return false; // Dans tout les cas, on utilise pas le form. On fait une redirection custom.
}

function togglePassword(event){
    const eye = event.target;
    const password = document.querySelector("#password");
    password.type = password.type === "password" ? "text" : "password";
    eye.src = eye.src.includes("images/eye-open.svg") ? "/images/eye-close.svg" : "/images/eye-open.svg";
    eye.title = eye.title === "Voir le mot de passe" ? "Cacher le mot de passe" : "Voir le mot de passe";
 }

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
    const password = document.querySelector("#password").value;
    const email = document.querySelector("#email").value;
    const theMessage = document.querySelector("#themessage").value;

    const validNom = nom.length >= 5;
    const validPassword = /[!@#$%^&*(),[.?":{}|<>]/.test(password) && password.length >= 8 && /[A-Z]/.test(password) && /\d/.test(password);
    const validEmail = /@/.test(email) && /\./.test(email);
    const validTheMessage = theMessage.trim().length > 0;

    let check = true;

    if(!validEmail){
        errorEmail.style.display = "block";
        check = false;
    }
    if(!validPassword){
        errorPassword.style.display = "block";
        check = false;
    }
    if(!validNom){
        errorNom.style.display = "block";
        check = false;
    }
    if(!validTheMessage){
        errorTheMessage.style.display = "block";
        check = false;
    }

    // Si il est true, on actualise la page en validant le formulaire
    // Si il est false, on n'actualise PAS la page et on ne valide PAS le formulaire
    return check;

}