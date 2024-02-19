function checkFistName() {
    var firstName = document.getElementById('#prenom').value;
    var lastName = document.getElementById('#prenom').value;
    var email = document.getElementById('#email').value;

    var validFirstName = firstName.length <= 100;
    var validLastName = lastName.length <= 100;
    var validEmail = /@/.test(email) && /\./.test(email);
    
    if (validFirstName == false || validLastName == false || validEmail == false){
        errorEmail.style.display =  "block";
        return false;
    }
}

function submitForm(e) {
    var firstName = document.getElementById('#prenom').value;
    var  lastName = document.getElementById('nom').value;
    var email = document.getElementById("email").value;
      e.preventDefault();

    if (firstName.length <= 100 && lastName.length <=100 && /@/.test(email) && /\./.test(email)) {
        alert("Envoie reussi !");
    } else {
        alert("Veuillez remplir tous les critères");
    }
}