function error_message(message, is_valid=false){
    const old_submit_message = document.querySelector("#submit-message");
    if (old_submit_message){
        old_submit_message.textContent = message;
        old_submit_message.className = is_valid ? "valid" : "not-valid";
        return;
    }
    const submit_message = document.createElement("h2");
    submit_message.id = "submit-message";
    submit_message.classList.add(is_valid ? "valid" : "not-valid");
    submit_message.textContent = message;
    const title = document.querySelector("#formulaire > form > h2");
    title.insertAdjacentElement('afterend', submit_message);
}
function validate(){
    const prenom = document.querySelector("#prenom").value;
    const nom = document.querySelector("#nom").value;
    const mail = document.querySelector("#mail").value;
    const message = document.querySelector("#message").value;
    if (prenom.length>100)error_message("maximum 100 caractères pour le prenom");
    else if (nom.length>100)error_message("maximum 100 caractères pour le nom");
    else if (message.length>600)error_message("maximum 600 caractères pour le message");
    else if (!/@.*\./.test(mail))error_message("format de l'email non valide");
    else {
        return true;
    }
    return false;
}