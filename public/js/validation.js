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

function displayScreenWidth() {
    let theWidth = window.innerWidth;
    document.getElementById("screenwidth").innerHTML = 'The screen width is: ' + theWidth;
}
    displayScreenWidth();
    
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

    if (preInp === "" || /\d/.test(preInp) || /[!@#$%^'"/=:.?<>&,;*()_+-]/.test(preInp)) {
        prenomLabel.style.color = "red";
    }else {
        prenomLabel.style.color = "black";
    }
    
    if (nomInp === "" || /\d/.test(nomInp) || /[!@#$%^'"/=:.?<>&,;*()_+-]/.test(nomInp)) {
        nomLabel.style.color = "red";
    }else {
        nomLabel.style.color = "black";
    }

    if (emailInp === "" || !periodTest || !atSymTest) {
        emailLabel.style.color = "red";
    }else {
        emailLabel.style.color = "black";
    }

    if (messInp === "") {
        messageLabel.style.color = "red";
    }else {
        messageLabel.style.color = "black";
    }

}