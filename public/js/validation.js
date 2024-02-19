//syncronisation nom,prenon ,email, message
fonction verif(){
    const errorNom = document.querySelector("#error-nom");
    const errorPrenom = document.querySelector("#error-prenom");
    const errorEmail = document.querySelector("#error-email");
    const errorTheMessage = document.querySelector("#error-themessage");

    const nom = document.querySelector("#nom").value;
    const prenom = document.querySelector("#prenom").value;
    const email = document.querySelector("#email").value;
    const themessage = document.querySelector("#themessage").value;



    const validNom = nom.length > 5;
    const validePrenom = prenom.length > 5;
    const validEmail = /@/.test(email)&& /\./test(email);

    let toutestok = true
//validation de l'email
if(!validEmail){
    errorEmail.computedStyleMap.display ="block";
    toutestok = false;

}
    
}
