const formContainer = document.querySelector("#formContainer");


function submitForm() {
   
    const prenom = document.querySelector("#firstname").value;
    const nom = document.querySelector("#lastname").value;
    const email = document.querySelector("#usermail").value;
    const message = document.querySelector("#message").value;
    resultDiv = document.querySelector("#resultat");

    var messageAlerte = "Bienvenue " + prenom + " " + nom + " !";
   
    if (prenom.length <= 100 && nom.length <= 100 && message.length <= 600 && /[@]/.test(email)&& /[.]/.test(email)) {
        alert(messageAlerte);
        resultDiv.textContent = "Insertion réussie !";
        resultDiv.style.textAlign = "center";
        resultDiv.style.color = "lightgreen";
        resultDiv.style.fontWeight = "bold";
        setTimeout(function () {
            formContainer.submit();
        }, 1000);        
        
    } else {
        resultDiv.textContent = "Veuillez remplir tous les critères.";
        resultDiv.style.textAlign = "center";
        resultDiv.style.color = "red";
        
    }

    return false;
}
