
  
  document.addEventListener("DOMContentLoaded", function () {
    var error = document.querySelector(".error");
    var form = document.querySelector('form[name="formulaire"]');
  
    form.addEventListener("submit", function (event) {
      var message = document.querySelector("#message").value;
      var firstname = document.querySelector("#firstname").value;
      var usermail = document.querySelector("#usermail").value;
  
      if (!verifMessage(message)) {
        error.innerHTML = "Le message ne doit pas dépasser 600 caractères.";
        error.className = "error active";
        event.preventDefault();
        return;
      }
      if (!verifFirstName(firstname)) {
        error.innerHTML = "Le prénom ne doit pas dépasser 100 caractères.";
        error.className = "error active";
        event.preventDefault();
        return;
      }
      if (!verifEmail(usermail)) {
        error.innerHTML = "Veuillez saisir une adresse e-mail valide.";
        error.className = "error active";
        event.preventDefault();
        return;
      }
    });
  });
  
  function verifFirstName(firstname) {
    return firstname.length <= 100;
  }
  
  function verifMessage(message) {
    return message.length <= 600;
  }
  
  function verifEmail(usermail) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(usermail);
  }


