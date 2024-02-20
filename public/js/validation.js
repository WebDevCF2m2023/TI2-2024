
document.addEventListener("DOMContentLoaded", function () {
    var message = document.querySelector("#message");
    var firstname = document.querySelector("#firstname");
    var usermail = document.querySelector("#usermail");
    var form = document.querySelector("form");
    var error = document.querySelector(".error");
  
    message.addEventListener("input", function (event) {
      if (message.validity.valid) {
        error.innerHTML = "";
        error.className = "error";
      }
    });
  
    firstname.addEventListener("input", function (event) {
      if (firstname.validity.valid) {
        error.innerHTML = "";
        error.className = "error";
      }
    });
  
    usermail.addEventListener("input", function (event) {
      if (usermail.validity.valid) {
        error.innerHTML = "";
        error.className = "error";
      }
    });
  
    form.addEventListener("submit", function (event) {
      if (!usermail.validity.valid) {
        error.innerHTML = "Veuillez saisir une adresse e-mail valide.";
        error.className = "error active";
        event.preventDefault();
      }
      if (!firstname.validity.valid) {
        error.innerHTML =
          "Le prénom et le nom ne doivent pas dépasser 100 caractères chacun.";
        error.className = "error active";
        event.preventDefault();
      }
      if (!message.validity.valid) {
        error.innerHTML = "Le message ne doit pas dépasser 600 caractères.";
        error.className = "error active";
        event.preventDefault();
      }
    });
  });
  
  function validateForm() {
    var message = document.querySelector("#message").value;
    var firstname = document.querySelector("#firstname").value;
    var usermail = document.querySelector("#usermail").value;
  
    if (!verifMessage(message)) return false;
    if (!verifFirstName(firstname)) return false;
    if (!verifEmail(usermail)) return false;
  
    return true;
  }
  
  function verifFirstName(firstname) {
    if (firstname.length > 100) {
      alert("Le prénom ne doit pas dépasser 100 caractères.");
      return false;
    }
    return true;
  }
  
  function verifMessage(message) {
    if (message.length > 600) {
      alert("Le message ne doit pas dépasser 600 caractères.");
      return false;
    }
    return true;
  }
  
  function verifEmail(usermail) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(usermail)) {
      alert("Veuillez saisir une adresse e-mail valide.");
      return false;
    }
    return true;
  }