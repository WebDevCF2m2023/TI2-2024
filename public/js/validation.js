    
    
    
    const formContainer = document.querySelector("#Form");
    
    formContainer.addEventListener('submit', function(event) {
        event.preventDefault();});

function Validation(){
    const CheckPrenom = document.querySelector("#Prenom").value;
    const CheckNom = document.querySelector("#Nom").value;
    const CheckMessage = document.querySelector("#TextArea").value;
    const CheckEmail = document.querySelector("#Email").value;
    
    var lengthPrenom = CheckPrenom.length <=100;
    var lengthNom = CheckNom.length <=100;
    var lengthMessage = CheckMessage.length <=600;
    var SymbolEmail = /[!@#$%^&*(),.?":{}|<>]/.test(CheckEmail);
        
    if(lengthPrenom  && lengthNom && lengthMessage && SymbolEmail ){
            alert("Bienvenue"+" "+CheckPrenom+" "+CheckNom);
        }else{
            alert("Un des champs a été mal écris");
        }
}