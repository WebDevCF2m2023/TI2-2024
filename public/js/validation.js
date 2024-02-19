function checkAge() {
  var age;
  age = document.getElementById("birthdate").value;
  console.log("age");
  if (age < 18) {
    alert("Vous ne pouvez pas acceder à ce site");
  } else {
    alert("Vous avez l'age requise pour rentrer dans ce site");
  }
}

function checkAge() {
  var age;
  age = document.getElementById("birthdate").value;
  console.log("age");
  if (age < 18) {
    alert("Vous n'avez pas accès à ce site");
  } else {
    alert("Bienvenue");
  }
}

function checkPassword() {
  var password = document.getElementById("pws").value;

  var lengthCheck = password.length >= 8;
  var uppercaseCheck = /[A-Z]/.test(password);
  var numberCheck = /\d/.test(password);
  var symbolCheck = /[!@#$%^&*(),.?":{}|<>]/.test(password);
}

function submitForm() {
  var password = document.getElementById("pws").value;

  if (
    password.length >= 8 &&
    /[A-Z]/.test(password) &&
    /\d/.test(password) &&
    /[!@#$%^&*(),.?":{}|<>]/.test(password)
  ) {
    alert("Inscription réussie !");
    /* setTimeout(function () {
            window.location.href = "https://2023.webdev-cf2m.be/Arnaldo/siteprefo/"; 
        }, 2000);*/
  } else {
    alert("Veuillez remplir tous les critères du mot de passe.");
  }
}
