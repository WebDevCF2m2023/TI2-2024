
    const messages = document.querySelector('#msg');
    const prenoms = document.querySelector('#lePrenom');
    const noms = document.querySelector('#leNom');
    const emails = document.querySelector('#eMail'); 
    
    var message = messages.value;
    var prenom = prenoms.value;
    var nom = noms.value; 
    var email = emails.value;     

 

    function validText(event){
     
             if (message.length > 600) {      
                 message.textContent = "Trop court";

             }else if(prenom.length >= 100){
                 prenom.textContent = "trop long";
                
             }else if(nom.length >=100){
                 nom.textContent = "Trop long";
            
             }else if ((/[@], [/.]/.test(email)) === false){
                 email.textContent = "Il manque @ ou ."
                
           
}
}    