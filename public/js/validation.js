 
 const formulaire = document.querySelector('#myForm');

 formulaire.addEventListener('submit', function(event) {                    
    event.preventDefault();
    validText();
   });
 
 function validText(){
     
     const messages = document.querySelector('#msg');
     const prenoms = document.querySelector('#lePrenom');
     const noms = document.querySelector('#leNom');
     const emails = document.querySelector('#eMail');
     const resultInput = document.querySelector("#result"); 
        
     var message = messages.value;
     var prenom = prenoms.value;
     var nom = noms.value; 
     var email = emails.value;     
 

        if (message.length >= 600) {      
            resultInput.textContent = "600 caractères maximum";
            resultInput.style.textAlign = "center";
            resultInput.style.color = "red";
            return false;

        }else if(prenom.length >= 100){
            resultInput.textContent = "Trop long, contactez le sav";
            resultInput.style.textAlign = "center";
            resultInput.style.color = "red";
            return false;
            
        }else if(nom.length >= 100){
            resultInput.textContent = "Trop long, contactez le sav";
            resultInput.style.textAlign = "center";
            resultInput.style.color = "red";
            return false;
        
        }else if ((/[@]/.test(email)) === false){
            resultInput.textContent = "il manque un @";
            resultInput.style.textAlign = "center";
            resultInput.style.color = "red";
            return false;

        }else if ((/[.]/.test(email)) === false){
            resultInput.textContent = "Il manque un .";
            resultInput.style.textAlign = "center";
            resultInput.style.color = "red";
            return false;

        }else{
            resultInput.textContent =  prenom + " " + nom + " " + "votre message est en cours d'envoi, vous allez être redirigé.";
            resultInput.style.textAlign = "center";
            resultInput.style.color = "greenyellow";

            setTimeout (function (){
                formulaire.submit();
            },2000);
            }
            
    

        }
    
     