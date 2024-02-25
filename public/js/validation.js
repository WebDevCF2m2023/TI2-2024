const maxLengthMessage = 600;
const minLengthName = 4;
const maxLengthName = 100;
const maxHeightComment = 350;

const colorError = "rgb(200, 62, 62)";
const colorSuccess = "rgb(109, 200, 47)";

const message = document.querySelector("#message");
const nom = document.querySelector("#nom");
const prenom = document.querySelector("#prenom");
const email = document.querySelector("#email");
const infosLengthMessage = document.querySelector("#infosLengthMessage");

const messageError = document.querySelector("#message-error");
const nomError = document.querySelector("#nom-error");
const prenomError = document.querySelector("#prenom-error");
const emailError = document.querySelector("#email-error");

const messageLabel = document.querySelector("label[for='message']");
const nomLabel = document.querySelector("label[for='nom']");
const prenomLabel = document.querySelector("label[for='prenom']");
const emailLabel = document.querySelector("label[for='email']");

const comments = document.querySelectorAll(".comment");
const informationMessage = document.querySelector("#information-message");

function validateForm(){
    informationMessage.style.display = "none";
    messageError.style.display = "none";
    nomError.style.display = "none";
    prenomError.style.display = "none";
    emailError.style.display = "none";

    let checkOK = true;
    if(!isValidNomLength(nom.value.trim())){
        checkOK = false;
        nomError.style.display = "block";
    }
    if(!isValidPrenomLength(prenom.value.trim())){
        checkOK = false;
        prenomError.style.display = "block";
    }
    const messageLength = getLengthMessage(message.value.trim());
    if(!isValidMessageLength(messageLength)){
        checkOK = false;
        messageError.style.display = "block";
    }
    if(!validEmail(email.value.trim())){
        checkOK = false;
        emailError.style.display = "block";
    }
    // Si true, le formulaire s'envoie
    // Si false, le formulaire ne s'envoie pas
    if(checkOK) alert(`Bienvenue ${prenom.value} ${nom.value}`);
    return checkOK;
}

addEventListener("resize", checkScrollY);
function checkScrollY(){
    comments.forEach(comment=>{
        if(comment.scrollHeight <= maxHeightComment){
            comment.classList.remove("scrollY");
            return;
        }
        comment.classList.add("scrollY");
    })
}
checkScrollY();

nom.addEventListener("input", ()=>{
    const valid = isValidNomLength(nom.value.trim());
    if(valid){
        nomError.style.display = "none";
    }
    setColor(nomLabel, valid);
});

prenom.addEventListener("input", ()=>{
    const valid = isValidPrenomLength(prenom.value.trim());
    if(valid){
        prenomError.style.display = "none";
    }
    setColor(prenomLabel, valid);
});

email.addEventListener("input", ()=>{
    const valid = validEmail(email.value.trim());
    if(valid){
        emailError.style.display = "none";
    }
    setColor(emailLabel, valid);
});

message.addEventListener("input", ()=>{
    const messageLength = getLengthMessage(message.value.trim());
    const valid = isValidMessageLength(messageLength);
    infosLengthMessage.textContent = messageLength + " / " + maxLengthMessage;
    if(!valid && !infosLengthMessage.classList.contains("error")){
        infosLengthMessage.classList.add("error");
        infosLengthMessage.classList.remove("success");
        setColor(messageLabel, false);
    }else if(valid && !infosLengthMessage.classList.contains("success")){
        infosLengthMessage.classList.add("success");
        infosLengthMessage.classList.remove("error");
        setColor(messageLabel, true);
    }
    if(valid){
        messageError.style.display = "none";
    }
});

/**
 * 
 * @param {HTMLLabelElement} label 
 * @param {boolean} success 
 */
function setColor(label, success){
    label.style.color = success ? colorSuccess : colorError;
    if(success){
        label.style.textShadow = "";
    }else{
        label.style.textShadow = "1px 1px 3px black";
    }
}

/**
 * 
 * @param {string} prenom
 * @returns {boolean}
 */
function isValidPrenomLength(prenom){
    const length = getLengthMessage(prenom);
    return length >= minLengthName && length <= maxLengthName;
}

/**
 * 
 * @param {string} nom
 * @returns {boolean}
 */
function isValidNomLength(nom){
    const length = getLengthMessage(nom);
    return length === 0 || (length >= minLengthName && length <= maxLengthName);
}

/**
 *
 * @param {number} messageLength
 * @returns {boolean}
 */
function isValidMessageLength(messageLength){
    return messageLength != 0 && messageLength <= maxLengthMessage;
}

/**
 * 
 * @param {string} email 
 * @returns {boolean}
 */
function validEmail(email){
    return /\S+@\S+.*\.\S+/.test(email) && !/\s/.test(email);
}

/**
 * 
 * @param {string} message 
 * @returns {number}
 */
function getLengthMessage(message){
    return Array.from(message).length;
}