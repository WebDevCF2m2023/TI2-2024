
function cachePassword(event){
    const eye = event.target;
    const password = document.querySelector("#password");
    password.type = password.type === "password" ? "text" : "password";
 }

function verif(){
    const errorPassword = document.querySelector("#error-password");
    const errorNom = document.querySelector("#error-nom");
    const errorEmail = document.querySelector("#error-email");
    const errorTheMessage = document.querySelector("#error-message");

    errorEmail.style.display = "none";
    errorNom.style.display = "none";
    errorPassword.style.display = "none";
    errormessage.style.display = "none";
    
    const nom = document.querySelector("#nom").value;
    const password = document.querySelector("#password").value;
    const email = document.querySelector("#email").value;
    const message = document.querySelector("#message").value;

    const validNom = nom.length >= 5;
    const validPassword = /[!@#$%^&*(),[.?":{}|<>]/.test(password) && password.length >= 8 && /[A-Z]/.test(password) && /\d/.test(password);
    const validEmail = /@/.test(email) && /\./.test(email);
    const validmessage = message.trim().length > 0;

    let ok = true;

    if(!validEmail){
        errorEmail.style.display = "block";
        ok = false;
    }
   
    if(!validNom){
        errorNom.style.display = "block";
        ok = false;
    }
    if(!validmessage){
        errormessage.style.display = "block";
        ok = false;
    }

    // Si il est true, on actualise la page en validant le formulaire
    // Si il est false, on n'actualise PAS la page et on ne valide PAS le formulaire
    return ok;

}