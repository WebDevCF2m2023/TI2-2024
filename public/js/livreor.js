

const errorNom = document.querySelector("#error-nom");
const errorPrenom = document.querySelector("#error-prenom");
const errorEmail = document.querySelector("#error-email");
const errormessage = document.querySelector("#error-message");


errorEmail.style.display = "none";
errorNom.style.display = "none";
errorPrenom.style.display = "none";
errormessage.style.display = "none";

function verif(){
    errorEmail.style.display = "none";
    errorNom.style.display = "none";
    errorPrenom.style.display = "none";
    errormessage.style.display = "none";
    //const de form et de submit qui manque//
    const nom = document.querySelector("#lastname").value;
    //const password = document.querySelector("#password").value;
    const prenom = document.querySelector("#firstname").value;
    const email = document.querySelector("#usermail").value;
    const message = document.querySelector("#message").value;

    const validNom = nom.length <= 100;
    const validPrenom = prenom.trim().length <= 100 && prenom.trim().length != 0;
    const validEmail = /@/.test(email) && /\./.test(email);
    // const validEmail = = /\S+@\S+\.\S+/ && !/\s/;
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

    if(!validPrenom){
        errorPrenom.style.display = "block";
        ok = false;
    }

    if(!validmessage){
        errormessage.style.display = "block";
        ok = false;
    }
    return ok;

}