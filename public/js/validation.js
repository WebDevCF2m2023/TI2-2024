function validateForm(e){

    const form = document.querySelector(".form");
    const nom = document.getElementById("firsname").value;
    const prenom = document.getElementById("lastname").value;
    const mail = document.getElementById ("usermail").value
    const mess = document.getElementById("message").value;    

    
    form.addEventListener('submit', function(e) {  
        e.preventDefault();});


    if (nom.length > 100 && prenom.length > 100){
      alert("Le nom ou prénom doit avoir au max 100 caractéres");
    }else if  
    (/@/.test(email) && /\./.test(email) 
     )
    {
        alert("Bienvenue " + prenom);
        setTimeout(direction, 2000);        
    } 
    else {
      alert("email doit contenir un @ ");
    }
}

function direction() {
    window.location.href="#";
  }
    
























    const nom = document.querySelector("#firstname").value;
    const email = document.querySelector("#usermail").value;
    const theMessage = document.querySelector("#message").value;

    const validNom = nom.length >= 100;
    const validEmail = /@/.test(usermail) && /\./.test(usermail);
    const validTheMessage = theMessage.trim().length > 600;
}