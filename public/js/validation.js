
function validateForm() {
    var message = document.getElementById("message").value;
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;

    // Vérification de la longueur du message
    if (message.length > 600) {
        alert("Le message ne doit pas dépasser 600 caractères.");
        return false;
    }

    // Vérification de la longueur du prénom et du nom
    if (firstname.length > 100 || lastname.length > 100) {
        alert("Le prénom et le nom ne doivent pas dépasser 100 caractères chacun.");
        return false;
    }

    // Vérification de l'adresse e-mail
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Veuillez saisir une adresse e-mail valide.");
        return false;
    }

    return true; 
}

