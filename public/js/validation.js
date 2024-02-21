
  
  document.addEventListener("DOMContentLoaded", function () {
    var error = document.querySelector(".error");
    var form = document.querySelector('form[name="formulaire"]');
  
    form.addEventListener("submit", function (event) {
      var message = document.querySelector("#message").value;
      var firstname = document.querySelector("#firstname").value;
      var lastname = document.querySelector("#lastname").value;
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
      
       var fullName = firstname + " " + lastname; // Concaténer prénom et nom
       if(firstname.length <= 100 && message.length <= 600 &&  /[.]/.test(usermail) && /[@]/.test(usermail) ){
       alert("Bienvenue " + fullName); // Afficher un message de bienvenue avec le nom complet
       return true;
       } else{
        event.preventDefault();
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
 // Si toutes les conditions sont respectées
 function valideForm(form){
  if(firstname.length <= 100 && message.length <= 600 &&  /[.]/.test(useremail) && /[@]/.test(useremail) ){
    alert("Bienvenue " + fullName); // Afficher un message de bienvenue avec le nom complet
    return true;
    } else{
    return false;
    }
 }
   