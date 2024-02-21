

function verif(){
    const errorNom = document.querySelector("#error-nom");
    const errorEmail = document.querySelector("#error-email");
    const errormessage = document.querySelector("#error-message");

    errorEmail.style.display = "none";
    errorNom.style.display = "none";
    errormessage.style.display = "none";
    //const de form et de submit qui manque//
    const nom = document.querySelector("#nom").value;
    const password = document.querySelector("#password").value;
    const email = document.querySelector("#email").value;
    const message = document.querySelector("#message").value;

    const validNom = nom.length >= 100;
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
    return ok;

}