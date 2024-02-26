const formContainer = document.querySelector("form");

function submitForm() {
    var password = document.getElementById("password").value;
    var nom = document.getElementById("nom").value;
    var email = document.getElementById("email").value;
    var themessage = document.getElementById("themessage").value;

    var lengthCheck = password.length >= 8;
    var uppercaseCheck = /[A-Z]/.test(password);
    var numberCheck = /\d/.test(password);
    var symbolCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);

    if (!lengthCheck) {
        alert("Le mot de passe doit contenir au moins 8 caractères.");
        return false;
    }

    if (!uppercaseCheck) {
        alert("Le mot de passe doit contenir au moins une lettre majuscule.");
        return false;
    }

    if (!numberCheck) {
        alert("Le mot de passe doit contenir au moins un chiffre.");
        return false;
    }

    if (!symbolCheck) {
        alert("Le mot de passe doit contenir au moins un symbole spécial.");
        return false;
    }

    if (nom === "") {
        alert("Veuillez saisir votre nom.");
        return false;
    }

    if (email === "") {
        alert("Veuillez saisir votre email.");
        return false;
    }

    if (themessage === "") {
        alert("Veuillez saisir votre message.");
        return false;
    }

    return true;
}