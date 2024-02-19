const formContainer = document.querySelector("#formContainer");

function submitForm() {
   
    const prenom = document.querySelector("#firstname").value;
    const nom = document.querySelector("#lastname").value;
    const email = document.querySelector("#usermail").value;
    const message = document.querySelector("#message").value;
    resultDiv = document.querySelector("#resultat");

    var messageAlerte = "Bienvenue  " + nom + prenom;
   
    if (prenom.length <= 100 && nom.length <= 100 && message.length <= 600 && /[@.]/.test(email)) {
        alert(messageAlerte);
        console.log(messageAlerte);
        return true;
    } else {
        resultDiv.textContent = "Veuillez remplir tous les critères.";
        resultDiv.style.textAlign = "center";
        resultDiv.style.color = "red";
        return false;
    }
}
