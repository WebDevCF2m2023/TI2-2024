
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

    let chuiContentToutEstBonOuPas = true;

    if(!validEmail){
        errorEmail.style.display = "block";
        chuiContentToutEstBonOuPas = false;
    }
    if(!validPassword){
        errorPassword.style.display = "block";
        chuiContentToutEstBonOuPas = false;
    }
    if(!validNom){
        errorNom.style.display = "block";
        chuiContentToutEstBonOuPas = false;
    }
    if(!validTheMessage){
        errorTheMessage.style.display = "block";
        chuiContentToutEstBonOuPas = false;
    }

    // Si il est true, on actualise la page en validant le formulaire
    // Si il est false, on n'actualise PAS la page et on ne valide PAS le formulaire
    return chuiContentToutEstBonOuPas;

}