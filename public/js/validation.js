const myForm = document.getElementById("myForm");
const myFormHead = document.getElementById("myFormHead");
const prenomInput = document.getElementById("prenomInput");
const nomInput = document.getElementById("nomInput");
const emailInput = document.getElementById("emailInput");
const yourMessageInput = document.getElementById("yourMessageInput");
const sendButton = document.getElementById("sendButton");
const prenomLabel = document.getElementById("prenomLabel");
const nomLabel = document.getElementById("nomLabel");
const emailLabel = document.getElementById("emailLabel");
const messageLabel = document.getElementById("messageLabel");
const messLenCount = document.getElementById("messLenCount");
const screenwidth = document.getElementById("screenwidth");




myForm.addEventListener('submit', function(event) {
    event.preventDefault();
});

yourMessageInput.addEventListener("input", countLength);

/*
function displayScreenWidth() {
    let theWidth = window.innerWidth;
    screenwidth.innerHTML = 'The screen width is: ' + theWidth;
}
    displayScreenWidth();
    window.addEventListener('resize', displayScreenWidth);

*/
function countLength() {
    let messToTest = yourMessageInput.value;
    messLenCount.textContent = messToTest.length;
    if (messToTest.length > 600){
        messageLabel.style.color = "red";
        myFormHead.style.color = "red";
        myFormHead.textContent = "Votre Message est trop long";
        sendButton.style.display = "none";
    }
    else {
        messageLabel.style.color = "";
        myFormHead.style.color = "";
        myFormHead.textContent = "Laissez-nous un message";
        sendButton.style.display = "initial";
    }
}

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

    if (preInp === "" || /\d/.test(preInp) || /[!@#$%^"/=:.?<>&,;*()_+]/.test(preInp) || preInp.length > 100) {
        prenomLabel.style.color = "red";
        myFormHead.style.color = "red";
        myFormHead.textContent = "Mettez votre prénom";
        goodPre = false;

        return false;
    }else {
        prenomLabel.style.color = "black";
        goodPre = true;
    }
    
    if (nomInp === "" || /\d/.test(nomInp) || /[!@#$%^"/=:.?<>&,;*()_+]/.test(nomInp) || nomInp.length > 100) {
        nomLabel.style.color = "red";
        myFormHead.style.color = "red";
        myFormHead.textContent = "Mettez votre nom";
        goodNom = false;

        return false;
    }else {
        nomLabel.style.color = "black";
        goodNom = true;
    }

    if (emailInp === "" || !periodTest || !atSymTest) {
        emailLabel.style.color = "red";
        myFormHead.style.color = "red";
        myFormHead.textContent = "Mettez votre email correctement";
        goodEmail = false;

        return false;
    }else {
        emailLabel.style.color = "black";
        goodEmail = true;
    }

    if (messInp === "") {
        messageLabel.style.color = "red";
        myFormHead.style.color = "red";
        myFormHead.textContent = "N'oublie pas votre message!!!";
        goodMess = false;

        return false;
    }else {
        messageLabel.style.color = "black";
        goodMess = true;
    }

    if (goodPre && goodNom && goodEmail && goodMess){
        // besoin de savoir comment lancer le POST maintenant
        myFormHead.style.color = "lightgreen";
        myFormHead.textContent = "Votre message a été ajouter. Bonne journée, " + preInp + " " + nomInp;
        setTimeout(function () {
        myForm.submit();
    }, 1999.999999999999999999999999999999999999999999999999999999999);
    }
}