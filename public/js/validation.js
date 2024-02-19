
const myForm = document.getElementById("myForm");
const prenomInput = document.getElementById("prenomInput");
const nomInput = document.getElementById("nomInput");
const emailInput = document.getElementById("emailInput");
const yourMessageInput = document.getElementById("yourMessageInput");
const sendButton = document.getElementById("sendButton");
const prenomLabel = document.getElementById("prenomLabel");
const nomLabel = document.getElementById("nomLabel");
const emailLabel = document.getElementById("emailLabel");
const messageLabel = document.getElementById("messageLabel")

myForm.addEventListener('submit', function(event) {
    event.preventDefault();
});

sendButton.addEventListener('click', validateInputs);
/*
function displayScreenWidth() {
    let theWidth = window.innerWidth;
    document.getElementById("screenwidth").innerHTML = 'The screen width is: ' + theWidth;
}
    displayScreenWidth();
  */  
window.addEventListener('resize', displayScreenWidth);

function validateInputs() {
    let preInp = prenomInput.value;
    let nomInp = nomInput.value;
    let emailInp = emailInput.value;
    let messInp = yourMessageInput.value;
    let period = /./;
    let atSym = /@/;
    let periodTest = period.test(emailInp);
    let atSymTest = atSym.test(emailInp);
    let goodPre = false;
    let goodNom = false;
    let goodEmail = false;
    let goodMess = false;

    if (preInp === "" || /\d/.test(preInp) || /[!@#$%^'"/=:.?<>&,;*()_+-]/.test(preInp) || preInp.length > 100) {
        prenomLabel.style.color = "red";
        goodPre = false;
    }else {
        prenomLabel.style.color = "black";
        goodPre = true;
    }
    
    if (nomInp === "" || /\d/.test(nomInp) || /[!@#$%^'"/=:.?<>&,;*()_+-]/.test(nomInp) || nomInp.length > 100) {
        nomLabel.style.color = "red";
        goodNom = false;
    }else {
        nomLabel.style.color = "black";
        goodNom = true;
    }

    if (emailInp === "" || !periodTest || !atSymTest) {
        emailLabel.style.color = "red";
        goodEmail = false;
    }else {
        emailLabel.style.color = "black";
        goodEmail = true;
    }

    if (messInp === "") {
        messageLabel.style.color = "red";
        goodMess = false;
    }else {
        messageLabel.style.color = "black";
        goodMess = true;
    }

    if (goodPre && goodNom && goodEmail && goodMess){
        // besoin de savoir comment lancer le POST maintenant
        alert("all good");
    }
}